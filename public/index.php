<?php

    // configuration
    require("../includes/config.php"); 
    
    $rows = CS50::query("SELECT symbol, shares, id FROM Portfolio WHERE user_id = ?", $_SESSION["id"]);
    
    $positions = [];
    
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "total" => $stock["price"] * $row["shares"],
                "symbol" => $row["symbol"]
            ];
        }
    }
    render("portfolio.php", ["positions" => $positions, "title" => "Portfolio"]);
?>
