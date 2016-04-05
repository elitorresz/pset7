<head> <style type="text/css"> body { background-color: #DCE892; font-family: Verdana; color:#11094E } </style> </head>

<form action="buy.php" method="post"> 
<fieldset>
    <div class="form-group">
            <input class="form-control" name="symbol" placeholder="Stock Symbol to Buy" type="text"/>
    </div>
    <div class="form-group">
            <input class="form-control" name="shares" placeholder="Shares" type="text"/>
    </div>
    <div class="form-group">
        <button class="btn btn-default" type="submit">
            <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
            Buy
        </button>
    </div>
</fieldset>
</form>