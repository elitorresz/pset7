<head> <style type="text/css"> body { background-color: #E68E8E; font-family: Verdana; color:#080709 } </style> </head>

<h5><?= $stock["symbol"] ?></h5>
<h1><?= $stock["name"] ?></h1>
Price: $<?= $stock["price"] ?>   

<div class="form-group">
    <a class="btn btn-default" href="buy.php?symbol=<?= $stock["symbol"] ?>">
        <span aria-hidden="true" class="glyphicon glyphicon-export"></span>
        Buy
    </a>
</div>