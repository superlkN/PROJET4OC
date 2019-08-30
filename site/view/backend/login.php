<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Login Page </title>
        <link href="<?php echo ASSETS;?>style.css" rel="stylesheet" /> 
    </head>        
    <body>
        <div class="frm">
            <form action="index.php?action=showDash" method="POST">
                <p>
                    <label>Username:</label>
                    <input type="text" id="user" name="user"  />
                </p>
                <p>
                    <label>Password:</label>
                    <input type="password" id="pw" name="pw" />
                </p>
                <p>
                    <input type="submit" id="btn" value="login" />
                </p>
            </form>  
        </div>
    </body>
</html>
> 
