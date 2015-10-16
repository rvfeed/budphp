<?php
session_start();
?>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
  <body>


<div class="container">
  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <div class="col-sm-12 col-md-10 col-md-offset-1">
        <div style="text-align:center;color:#f22; font-weight: bold;"><?=$_SESSION["error"]?></div>
        <form action="controllers/login.php" method="post" id="loginForm">
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input class="form-control" type="text" name='username' placeholder="username"/>
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control" type="password" name='password' placeholder="password"/>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-def btn-block">Login</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div></body>
</html>
<?php
$_SESSION["error"] = "";
?>