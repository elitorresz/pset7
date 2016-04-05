<head> <style type="text/css"> body { background-color: #FFFFFF; font-family: Courier; color:#A346D2 } </style> </head>

<table class = "table table-condensed">
<thead>
    <tr>
        <th class=info>Transaction</th>
        <th class=danger>Date</th>
        <th class=info>Symbol</th>
        <th class=danger>Shares</th>
        <th class=info>Price</th>
    </tr>
</thead>
<tbody>
    <?php
        foreach ($positions as $position)
        {
            print("<tr>");
            print("<th class=info><h6>{$position["transaction"]}</h6></th>");
            print("<th class=danger><h6>{$position["date"]}</h6></th>");
            print("<th class=info><h6>{$position["symbol"]}</h6></th>");
            print("<th class=danger><h6>{$position["shares"]}</h6></th>");
            echo("<td class=info>" . number_format($position["price"],2) . "</td>");
            print("</tr>");
        }
    ?>
</tbody>
</table>