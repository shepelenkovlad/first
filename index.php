<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Examination project</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </head>
  <body>
    <?php 
    include_once('pages/classes.php'); 
    ?>
    
    <div class="container-fluid">
    <!-- ================================NAVIGATION BAR============================================ -->
        <div class="row">
            <nav class="navbar navbar-default" role="navigation">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="index.php">Examination project</a>
                    </div>        
                    <?php if (isset($_SESSION['name'])) {?>
                    <!-- Menu -->
                    
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li><a href="index.php?id=1">Upload</a></li>
                        <li><a href="index.php?id=2">Gallery</a></li>
                      </ul>
                          <form class="navbar-form navbar-right" action="index.php" method="post">
                                <button type="submit" class="btn btn-danger" name="log_out">Log out</button>
                          </form>               
                    </div><!-- /.navbar-collapse -->
                    
                    <!-- AUTHORIZE -->
                    <?php 
                        if (isset($_POST['log_out']))
                        {
                            unset($_SESSION['name']);
                            echo "<script>location.reload()</script>";
                        }
                    } else  { ?>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <form class="navbar-form navbar-right" action="index.php" method="post">
                            <div class="form-group">
                              <input type="text" placeholder="Login" class="form-control" name="login">
                            </div>
                            <div class="form-group">
                              <input type="password" placeholder="Password" class="form-control" name="pass">
                            </div>
                            <button type="submit" class="btn btn-success" name="log">Sign in</button>
                            <a href="index.php?id=3">Register</a>    
                    </form>     
                    </div><!-- /.navbar-collapse -->
                    <?php 
                              if (isset($_POST['log']))
                    {
    
                      if (Tools::check($_POST['login'],$_POST['pass'])==true)
                      {
                        $_SESSION['name'] = $_POST['login'];
                        echo $_SESSION['name'];
                        echo "<script>location.reload();</script>";
                        
                      }
                      else
                      {
                        echo "Error";
                      }
                    }
                    
                    } ?>
                  </div><!-- /.container-fluid -->
            </nav>
        </div>
       <!-- ================================CONTENT============================================ -->
       <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 vcenter">
           <?php
        
          
            ?>
            <?php
                if (isset($_GET['id']))
                {
                    if ($_GET['id']==1) include_once('pages/upload.php');
                    if ($_GET['id']==2) include_once('pages/gallery.php');
                    if ($_GET['id']==3) include_once('pages/register.php');
                }
                else
                {
                    include_once('pages/info.php');
                }
            ?>
            </div>
       </div> 
    </div>
    
  </body>
</html>