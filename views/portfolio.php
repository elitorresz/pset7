<table class = "table table-striped">
<thead>
    <tr>
        <th>Name</th>
        <th>Symbol</th>
        <th>Shares</th>
        <th>Price</th>
        <th>Total</th>
    </tr>
</thead>
<tbody>
    <?php
        foreach ($positions as $position)
        {
            print("<tr>");
            print("<th><h6>{$position["name"]}</h6></th>");
            print("<th><h6>{$position["symbol"]}</h6></th>");
            print("<th><h6>{$position["shares"]}</h6></th>");
            print("<th><h6>{$position["price"]}</h6></th>");
            print("<th><h6>{$position["total"]}</h6></th>");
            print("</tr>");
        }
    ?>
</tbody>
</table>