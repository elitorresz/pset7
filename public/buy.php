<?php
    // configuration
    require("../includes/config.php"); 

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // Render form
        render("buy_form.php", ["title" => "Buy"]);
    }
    // if the form was submitted
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Si no escribio nada    
        if (empty($_POST["symbol"]))
        {
            apologize("Write a stock, please");
        }
        
        // si no existe
        if (empty($_POST["shares"]) || $_POST["shares"] == NULL)
        {
            apologize("Write a number, please");
        }
        
        if ($_POST["shares"] == 0)
        {
            apologize("Write a valid amount of shares, please");
        }
        
        // Si es fraccion
        if (preg_match("/^\d+$/", $_POST["shares"]) == false)
        {
            apologize("Write an integer number, please");
        }
        
        // look up stock
        $stock= lookup($_POST["symbol"]);
        
        if ($stock == 0)
        {
            apologize("Enter a valid stock, please");
        }


        $cash = $_POST["shares"] * $stock["price"];
        
        $money = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        // no comprar no tiene dinero suficiente
        if ($money[0]["cash"] < $cash)
        {
            apologize("You don't have enough money");
        }

       // cambiar portfolio
        CS50::query("INSERT INTO Portfolio (user_id, symbol, shares) VALUES (?, ?, ?) 
        ON DUPLICATE KEY UPDATE shares = shares + ?", $_SESSION["id"], strtoupper($_POST["symbol"]), 
        $_POST["shares"], $_POST["shares"]);

        // cash balance cambia
        CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $cash, $_SESSION["id"]);
        
        // poner en history
        CS50::query("INSERT INTO history (transaction, date, symbol, user_id, 
        shares, price) VALUES ('BUY', NOW(), ? , ? , ?, ?)", $_POST["symbol"],
        $_SESSION["id"], $_POST["shares"], $stock["price"]);

        redirect("/");
    }
?>

