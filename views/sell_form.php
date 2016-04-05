<head> <style type="text/css"> body { background-color: #D0B598; font-family: Arial; color:#190F05 } </style> </head>

<form action="sell.php" method="post"> 
    <div class="form-group">
        <select class ="form-control" name = "symbol">
            
        <option value = "symbol">Symbol</option>
            <?php
            foreach($symbols as $symbol)
            {
                print ('<option value="'.$symbol['symbol'].'">'.$symbol['symbol'].'</option>');
            }
           ?>
        </select>
    </div>
    
    <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="shares" placeholder="Shares" type="text"/>
    </div>

    <div class="form-group">
        <button class="btn btn-default" type="submit">
            <span aria-hidden="true" class="glyphicon glyphicon-hand-right"></span>
            Sell
        </button>
    </div>
</form>