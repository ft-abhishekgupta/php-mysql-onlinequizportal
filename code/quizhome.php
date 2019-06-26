<?php
  session_start();
  if(!isset($_SESSION["studentloggedin"]) || $_SESSION["studentloggedin"] !== true){
      header("location: studentlogin.php");
      exit;
  }
  if(isset($_SESSION["quizset"])){
      header("location: quizpage.php");
      exit;
  }
  $rollnumber=$_SESSION["rollnumber"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Quiz
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="./assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />  
</head>
<body class="login-page sidebar-collapse">
<?php   
  include "database.php";
  $query = "select * from quizconfig where quiznumber=(select max(quiznumber) from quizconfig);";    
  $result = $conn->query($query);   
  $row = $result->fetch_assoc();                   
  $quiznumber=$row["quiznumber"];
  $typea=$row["typea"];
  $typeb=$row["typeb"];
  $typec=$row["typec"];
  $typed=$row["typed"];
  $typee=$row["typee"];
  $typef=$row["typef"];
  $duration=$row["duration"];
  $starttime=$row["starttime"];
  $maxmarks=$row["maxmarks"];
  $numques=$typea+$typeb+$typec+$typed+$typee+$typef;
  $_SESSION["quiznumber"] = $quiznumber;
  $_SESSION["numques"] = $numques;
  $buttonon="";
  $buttonvalue="begin quiz";
  $query = "select * from result where rollnumber=".$rollnumber." and quiznumber=".$quiznumber." and submit=1;";
  $result = $conn->query($query);
  if($result->num_rows > 0){
    $buttonon="disabled";
    $buttonvalue="Quiz already submitted";
  }
  $conn->close();  
?>
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="studentlogin.php">
          Genesis (Roll Number : <?php echo $rollnumber;?>) </a>        
      </div>      
    </div>
  </nav>
  <div class="page-header header-filter" style="background-image: url('./assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row" style="margin-top: 100px">
        <div class="col-lg-10 col-md-10 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" name="register" action="randomqgen.php" method="post">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Quiz <?php echo $quiznumber;?></h4>
              </div>
              <p class="description text-center">Read the instructions below :</p>
              <div class="card-body">
                <div style="padding-left: 10px;">
                  <h5 class="title" style="color: black;margin: 0px;">Guidelines -</h5>
                  <ol>
                    <li>Quiz will be automatically submitted when timer ends</li>
                    <li>You can submit quiz at any point of time.</li>
                    <li>You can login again if you accidently logged out of Genesis and continue your quiz.</li>
                  </ol>
                </div>
                <div style="padding-left: 10px;">
                  <h5 class="title" style="color: black;margin: 0px;">Quiz Configuration-</h5>
                  <div class="row">
                    <div class="col">
                      <ul>
                        <li>Duration : <?php echo $duration;?> minutes</li>
                        <li>Number of Questions : <?php echo $numques;?></li>  
                        <li>Number of MCQ : <?php echo $typea;?></li>                     
                        <li>Number of Numerical Type : <?php echo $typeb;?></li>                     
                        <li>Number of Drop Down : <?php echo $typec;?></li>    
                      </ul>
                    </div> 
                    <div class="col">
                      <ul>
                        <li>Start Time : <?php echo $starttime;?></li> 
                        <li>Maximum Marks : <?php echo $maxmarks;?></li>   
                        <li>Number of Fill in the blank : <?php echo $typed;?></li>                     
                        <li>Number of Short Answer Type : <?php echo $typee;?></li>                    
                        <li>Number of Essay Type : <?php echo $typef;?></li>                    
                      </ul>
                    </div> 
                  </div>                  
                </div>
              </div>
              <input type="hidden" name="something" value="something">
              <div class="text-center">                
                <button type="submit" style="margin-bottom: 15px;" class="btn btn-primary btn-round" <?php echo $buttonon;?>><?php echo $buttonvalue;?></button>
              </div>
            </form>            
          </div>
        </div>
      </div>
    </div>
  </div>  
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/moment.min.js"></script>
  <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
  <script src="../assets/js/material-kit.js?v=2.0.4" type="text/javascript"></script>
</body>
</html>