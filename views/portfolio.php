<head> <style type="text/css"> body { background-color: #F2F29E; font-family: Courier New; color:#AC8EE6 } </style> </head>

<table class = "table table-striped">
<thead>
    <tr>
        <th class=success>Name</th>
        <th>Symbol</th>
        <th class=success>Shares</th>
        <th>Price</th>
        <th class=success>Total</th>
    </tr>
</thead>
<tbody>
    <?php
        foreach ($positions as $position)
        {
            print("<tr>");
            print("<th class=success><h6>{$position["name"]}</h6></th>");
            print("<th><h6>{$position["symbol"]}</h6></th>");
            print("<th class=success><h6>{$position["shares"]}</h6></th>");
            print("<th><h6>{$position["price"]}</h6></th>");
            print("<th class=success><h6>{$position["total"]}</h6></th>");
            print("</tr>");
        }
    ?>
</tbody>
</table>