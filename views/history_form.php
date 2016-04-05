<head> <style type="text/css"> body { background-color: #46D2CD; font-family: Courier; color:#A346D2 } </style> </head>

<table class = "table table-condensed">
<thead>
    <tr>
        <th>Transaction</th>
        <th>Date</th>
        <th>Symbol</th>
        <th>Shares</th>
        <th>Price</th>
    </tr>
</thead>
<tbody>
    <?php
        foreach ($positions as $position)
        {
            print("<tr>");
            print("<th><h6>{$position["transaction"]}</h6></th>");
            print("<th><h6>{$position["date"]}</h6></th>");
            print("<th><h6>{$position["symbol"]}</h6></th>");
            print("<th><h6>{$position["shares"]}</h6></th>");
            echo("<td>" . number_format($position["price"],2) . "</td>");
            print("</tr>");
        }
    ?>
</tbody>
</table>