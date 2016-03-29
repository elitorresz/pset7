<?php

    // configuration
    require("../includes/config.php");

    // via GET (by clicking a link or redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render pasword
        render("password_form.php", ["title" => "Register"]);
    }

    // if form was submitted
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       // new_password and confirmation not empty
       if (empty($_POST["new_password"]) || empty($_POST["confirmation"]))
       {
           apologize("You must enter new password and confirmation");
       }
       // new_password and confirmation are the same
       else if ($_POST["new_password"] != $_POST["confirmation"])
       {
           apologize("Password and confirmation do not match");
       }
       
       // update password
       else
       {
           // update hash for user to crypt of new_password
           $final = CS50::query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["new_password"]), $_SESSION["id"]);
           
           // if failed apologize
           if ($final === false)
           {
               apologize("Your password could not be changed, please try again");
           }
           
           // if successful redirect to index
           else
           {
               redirect("/index.php");
           }
       }
   }
   
   // if the form was not submitted
   else
   {
       render("new_pformat.php", ["title" => "Register"]);
   }
?>