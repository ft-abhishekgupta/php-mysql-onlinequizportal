<?php
  session_start();
  if(isset($_SESSION["instructorloggedin"]) && $_SESSION["instructorloggedin"] === true){
    header("location: instructorhome.php");
    exit;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Genesis</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="">
    <link href="assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
  </head>
  <body>
    <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg"  color-on-scroll="100">
  <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="">
          Genesis </a>
      </div>
  </div>
</nav>
<div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/bg3.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h1>Instructor's Portal</h1>
          <h4 class="title text-center">Manage Quiz</h4>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 col-md-8 ml-auto mr-auto">
    <div class="card card-login" style="height: 320px">
      <form class="form" method="POST" action="instructorlogin.php">
        <div class="card-header card-header-primary text-center">
          <h4 class="card-title">Login</h4>
        </div>
        <p class="description text-center">Only Course Instructor or Teacher Assistants can login.</p>
        <div class="card-body">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="material-icons">mail</i>
              </span>
            </div>
            <input type="email" name="email" class="form-control" placeholder="Email...">
          </div>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="material-icons">lock_outline</i>
              </span>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Password...">
          </div>
        </div>
        <div class="footer text-center">
          <button type="submit" style="margin-left: 30px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Get Started</button>
        </div>
      </form>
      <?php
        if ($_POST){
          include "database.php";
          $email= $_POST["email"];
          $password = $_POST["password"];    
          $sql = "select email from instructorinfo where email='".$email."' and password='".$password."';";
          $result = $conn->query($sql);
          if($result->num_rows > 0){
            session_start();
            $_SESSION["instructorloggedin"] = true;
            $_SESSION["email"] = $email;   
            header("location: instructorhome.php");
          }
          else{
           echo '<p class="h6 text-center" style="color:red;">Incorrect email id or password</p>';
          } 
          $conn->close();   
        } 
      ?>
    </div>
  </div>
</div>
<footer class="footer footer-default" >
  <div class="container">
    <nav class="float-right">
      Abhishek
    </nav>   
  </div>
</footer>
<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/moment.min.js"></script>
<script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="assets/js/material-kit.js?v=2.0.4" type="text/javascript"></script>
</body>
</html>