<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (link or redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
    
    // if user reached page via POST (submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // not written
        if ( empty($_POST["username"]) || empty($_POST["name"]) ||  
            empty($_POST["last_name"]) || empty($_POST["password"])) 
        {
            apologize("Fill in all the blanks, please.");
        }
        
        // different confirmation and password
        if ($_POST["password"] != $_POST["confirmation"]) 
        {
            apologize("Be sure that your password is the same as the confirmation
            please");
        }
        
        if (CS50::query("INSERT IGNORE INTO users (username, hash, cash, name, 
        last_name) VALUES(?, ?, 10000.0000, ?, ?,?)", $_POST["username"], 
        password_hash($_POST["password"], PASSWORD_DEFAULT),  $_POST["name"], 
        $_POST["last_name"]) == 0)
        {
            apologize("This username already exists, pick another one please.");
        }
        
        else
        {
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION["id"] = $id;
            
            redirect("/");
        }
    }
?>