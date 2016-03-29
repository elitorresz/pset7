<?php

    // configuration
    require("../includes/config.php");

    // via GET (by clicking a link or redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render pasword
        render("password_form.php", ["title" => "Register"]);
    }

    // user reached page via POST (by submitting a form POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["old_password"]))
        {
            apologize("Write your old password, please");
        }
        else if (empty($_POST["new_password"]))
        {
            apologize("Write a new password, please");
        }
        else if (empty($_POST["confirmation"]))
        {
           apologize("Confirm your password, please");
        }
        else if ($_POST["new_password"] != $_POST["confirmation"])
        {
            apologize("Your new password and the confirmation do not match");
        }

        else
        {
            // update hash for user to crypt of new_password
           $final = CS50::query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["new_password"]), $_SESSION["id"]);
           
           // if failed apologize
           if ($final === false)
           {
               apologize("Password could not be changed, please try again");
           }
           // if successful redirect to index
           else
           {
               redirect("/index.php");
           }
        }
    }
    else
    render("password_form.php", ["title" => "password"])
?>