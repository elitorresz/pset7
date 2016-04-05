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
        // how many stocks you'll sell
        $sharerows = CS50::query("SELECT shares FROM Portfolio WHERE user_id = ? AND Symbol = ?",$_SESSION["id"],$_POST["symbol"]);
        $numofshares = $sharerows[0]["shares"];
        
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
        
        // if the number you want to sell is incorrect
        if ($numofshares < $_POST["shares"])
        {
            apologize("Write a correct number of shares, please");
        }
        
        else if (!preg_match("/^\d+$/", $_POST["shares"]))
        {
            if($_POST["shares"] != "ALL")
            {
                apologize("Write a correct number of shares, please");
            }
        } 
        
        // modificar cash
        $cash = $shares[0]["shares"] * $stock["price"];
        
        if ($numofshares > $_POST["shares"])
        {
           // Change cash
            $cashnuevo = $_POST["shares"] * $stock["price"];
                
            // Modificar
            CS50::query("UPDATE users SET cash = cash + $cashnuevo WHERE id = ?", $_SESSION["id"]);
                
            CS50::query("UPDATE Portfolio SET shares = shares - ? WHERE user_id = ? AND symbol = ?",  $_POST["shares"], $_SESSION["id"], $_POST["symbol"]);
            
            //update history
            CS50::query("INSERT INTO history (user_id, transaction, date, symbol, shares, price) VALUES (?, 'SELL', NOW(), ?, ?, ?)",
            $_SESSION["id"], $_POST["symbol"],$_POST["shares"], $stock["price"]);
        
        }
            
        else if ($numofshares == $_POST["shares"] || $_POST["shares"] == "ALL" )
        {
            // Change cash
            $cashnuevo = $sharerows[0]["shares"] * $stock["price"];
                
            // Modificar
            CS50::query("UPDATE users SET cash = cash + $cashnuevo WHERE id = ?", $_SESSION["id"]);
                
            // Remove stock from portfolio
            $rows = CS50::query("DELETE FROM Portfolio WHERE user_id = ? AND Symbol = ?", $_SESSION["id"],$_POST["symbol"]);
                
            // Update history
            CS50::query("INSERT INTO history (user_id, transaction, date, symbol, shares, price) VALUES (?, 'SELL', NOW(), ?, ?, ?)",
            $_SESSION["id"], $_POST["symbol"],$sharerows[0]["shares"], $stock["price"]);
        }
        redirect("/");
    }
?>