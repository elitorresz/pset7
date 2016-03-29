<?php
    // configuration
    require("../includes/config.php"); 
    
    $rows = CS50::query("SELECT * FROM history WHERE user_id = ?", $_SESSION["id"]);
    
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "transaction" => $row["transaction"],
                "date" => $row["date"],
                "symbol" => $row["symbol"],
                "user_id" => $row["user_id"],
                "shares" => $row["shares"],
                "price" => $stock["price"]
            ];
        }
    }
    
    // render history
    render("history_form.php", ["positions" => $positions, "title" => "Positions"]);
?>