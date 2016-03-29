<form action="sell.php" method="post"> 
<fieldset>
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
        <button class="btn btn-default" type="submit">
            <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
            Sell
        </button>
    </div>
</fieldset>
</form>



          
