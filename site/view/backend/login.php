<?php $title = 'Login Page'; ?>

<div id="loginForm">
    <form action="process.php" method="POST">
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

<?php require(VIEWBACK.'template.php'); ?>