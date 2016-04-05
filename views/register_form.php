<head> <style type="text/css"> body { background-color: #B098D0; font-family: Courier New; color:#AC8EE6 } </style> </head>
<form action="register.php" method="post">
    <fieldset>
        
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="name" placeholder="First name" type="text"/>
        </div>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="last_name" placeholder="Last name" type="text"/>
        </div>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        
        
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirmation" type="password"/>
        </div>


        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                <h3>Register</h3>
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a>
</div>
