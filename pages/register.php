<form class="navbar-form " action="index.php?id=3" method="post">
                            <div class="form-group">
                              <input type="text" placeholder="Login" class="form-control" name="rlog">
                            </div>
                            <div class="form-group">
                              <input type="password" placeholder="Password" class="form-control" name="rpass">
                            </div>
                            <button type="submit" class="btn btn-success" name="regis">Register</button>
                            
</form>  
<?php
    if (isset($_POST['regis']))
    {
        $pdo = Tools::Connect('localhost','root','123456','examsh');
        
        $login = trim(htmlspecialchars($_POST['rlog']));
        $pass = trim(htmlspecialchars($_POST['rpass']));
        
        
        if (!empty($login) && !empty($pass) )
        {
        
            $sel = 'insert into users (username, password) value ("'.$login.'","'.$pass.'")';
            $pdo->query($sel);
        
        }
        
        echo "User added!";
    }
?>