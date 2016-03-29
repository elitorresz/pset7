<?php
    // configuration
    require("../includes/config.php"); 
    
    // if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Validate name
        if (empty($_POST["symbol"]))
        {
            apologize("Please enter the stock symbol");
        }
        
        // look for the stock
        $stock = lookup($_POST["symbol"]);
        
        if(!$stock)
        {
            apologize("The entered stock symbol was invalid.");
        }
        
        else
        {
            // Render the result form
            render("quote_view.php", ["title" => "Quote", "stock" => $stock]);
        }
    }
    else
    {
        // Render form
        render("quote_form.php", ["title" => "Quote"]);
    }
    
?>