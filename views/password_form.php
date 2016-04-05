<head> <style type="text/css"> body { background-color: #A4F0C6; font-family: Verdana; color:#0E4D6C } </style> </head>

<form action="password.php" method="post">
    <fieldset>
        <div class="form-group">
            <input class="form-control" name="new_password" placeholder="New password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirm your password" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-active" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Change password
            </button>
        </div>
    </fieldset>
</form>