<?php
    // configuration
    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // Render form
        $symbols = CS50::query("SELECT symbol FROM Portfolio WHERE user_id = ?", $_SESSION["id"]); render("sell_form.php", ["title" => "Sell", "symbols" => $symbols]);
    }
    
    // if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // lookup stock - money
        $stock = lookup($_POST["symbol"]);
        
        // dont let sell stocks that doesnt exist
        if (!$stock)
        {
            apologize("Write a valid stock, please");
        }

        $shares = CS50::query("SELECT shares FROM Portfolio WHERE user_id = ? AND symbol = ?", $_SESSION["id"], strtoupper($_POST["symbol"]));
        
        // si no existe
        if (empty($_POST["symbol"]) || $_POST["symbol"] == NULL)
        {
            apologize("Write a stock, please");
        }
        
        $cash = $shares[0]["shares"] * $stock["price"];
        
        // borrar cosas
        CS50::query("DELETE FROM Portfolio WHERE user_id = ? AND symbol = ?", $_SESSION["id"], strtoupper($_POST["symbol"]));
        
        // cash balance cambia
        CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $cash, $_SESSION["id"]);
        
        // poner en history
        CS50::query("INSERT INTO history (transaction, symbol, shares, user_id, price) VALUES('SELL', ?, ?, ?, ?)", $_POST["code"], $shares[0]["shares"], $_SESSION["id"], $stock["price"]);
        
        redirect("/");
    }
?>