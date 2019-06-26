<?php
  session_start();
  if(!isset($_SESSION["instructorloggedin"]) || $_SESSION["instructorloggedin"] !== true){
      header("location: instructorlogin.php");
      exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Question Feed
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="./assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
</head>
<body class="login-page sidebar-collapse">
  <?php
    if(!$_POST){
      $active1="active";
      $active2="";
      $active3="";
      $active4="";
      $active5="";
      $active6="";
    }   
    else {
      $type = $_POST["type"];
      if ($type=="a") {
        $active1="active";
        $active2="";
        $active3="";
        $active4="";
        $active5="";
        $active6="";
      }
      elseif($type=="b"){
        $active1="";
        $active2="active";
        $active3="";
        $active4="";
        $active5="";
        $active6="";
      }
      elseif ($type=="c") {
        $active1="";
        $active2="";
        $active3="active";
        $active4="";
        $active5="";
        $active6="";
      }
      elseif ($type=="d") {
        $active1="";
        $active2="";
        $active3="";
        $active4="active";
        $active5="";
        $active6="";
      }
      elseif ($type=="e") {
        $active1="";
        $active2="";
        $active3="";
        $active4="";
        $active5="active";
        $active6="";
      }
      elseif ($type=="f") {
        $active1="";
        $active2="";
        $active3="";
        $active4="";
        $active5="";
        $active6="active";
      }
    } 
  ?>
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="instructorhome.php">
          Genesis Portal </a>        
      </div>      
    </div>
  </nav>
  <div class="page-header header-filter" style="background-image: url('./assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row" style="margin-top: 100px">
        <div class="col-lg-10 col-md-10 ml-auto mr-auto">
          <div class="card card-login" style="height: 590px">            
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Feed Questions into Question Bank</h4>
              </div>
              <p class="description text-center">Select the type of question , input the required fields and then press feed.</p>
              <div class="row" style="padding: 20px">
                <div class="col-md-4">
                  <ul class="nav nav-pills nav-pills-rose flex-column">
                    <li class="nav-item"><a class="nav-link <?php echo $active1;?>" href="#tab1" data-toggle="tab">MCQ Questions</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $active2;?>" href="#tab2" data-toggle="tab">Numerical Type</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $active3;?>" href="#tab3" data-toggle="tab">Drop Down</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $active4;?>" href="#tab4" data-toggle="tab">Fill in the blank</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $active5;?>" href="#tab5" data-toggle="tab">Short Answer Type</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $active6;?>" href="#tab6" data-toggle="tab">Essay Type</a></li>
                  </ul>
                </div>
                <div class="col-md-8" style="padding-right:40px ">
                  <div class="tab-content">
                      <div class="tab-pane <?php echo $active1;?>" id="tab1">
                        
                        <form name="typea" action="questionfeed.php" method="post">
                          <input type="hidden" name="type" value="a"/>
                          <div class="form-group">
                            <label >Question</label>
                            <textarea name="question" class="form-control" rows="3" required></textarea>
                          </div>
                          <div class="form-group" style="padding:0px ">
                            <input class="form-control" type="text" name="optiona" placeholder="Option A" required>
                          </div>
                          <div class="form-group" style="padding:0px ">
                            <input class="form-control" type="text" name="optionb" placeholder="Option B" required>
                          </div>
                          <div class="form-group" style="padding:0px ">
                            <input class="form-control" type="text" name="optionc" placeholder="Option C" required>
                          </div>
                          <div class="form-group" style="padding:0px ">
                            <input class="form-control" type="text" name="optiond" placeholder="Option D" required>
                          </div>
                          Correct Option
                          <div class="form-check form-check-radio form-check-inline" style="margin: 0px;padding: 0px">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio"  id="inlineRadio1" name="answer" value="A" checked> A
                              <span class="circle">
                                  <span class="check"></span>
                              </span>
                            </label>
                          </div>
                          <div class="form-check form-check-radio form-check-inline" style="margin: 0px;padding: 0px">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" id="inlineRadio2" name="answer" value="B"> B
                              <span class="circle">
                                  <span class="check"></span>
                              </span>
                            </label>
                          </div>
                          <div class="form-check form-check-radio form-check-inline" style="margin: 0px;padding: 0px">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" id="inlineRadio3"  name="answer" value="C">C
                              <span class="circle">
                                  <span class="check"></span>
                              </span>
                            </label>
                          </div>
                          <div class="form-check form-check-radio form-check-inline" style="margin: 0px;padding: 0px">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" id="inlineRadio3"  name="answer" value="D"> D
                              <span class="circle">
                                  <span class="check"></span>
                              </span>
                            </label>
                          </div>
                          <div class="text-center">
                            <button type="submit" style="margin-left: 30px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Feed</button>
                          </div>
                        </form> 
                        <?php
                          $type = $_POST["type"];
                          if($type=="a"){
                            include "database.php";
                            $question = $_POST["question"];
                            $optiona = $_POST["optiona"];
                            $optionb = $_POST["optionb"];
                            $optionc = $_POST["optionc"];
                            $optiond = $_POST["optiond"];
                            $answer = $_POST["answer"];                            
                            $sql = "insert into mcqdb (question,optiona,optionb,optionc,optiond,answer) values ('".$question."','".$optiona."','".$optionb."','".$optionc."','".$optiond."','".$answer."');";  
                            if ($_POST && $conn->query($sql) === TRUE) {
                                  echo '<p class="h6 text-center" style="color:green;">Feed Successful</p>';
                             } 
                            $conn->close();   
                          }
                        ?>
                      </div>
                      <div class="tab-pane <?php echo $active2;?>" id="tab2">
                        <form name="typeb" action="questionfeed.php" method="post">
                          <input type="hidden" name="type" value="b"/>
                          <div class="form-group">
                            <label >Question</label>
                            <textarea name="question" class="form-control" rows="5" required></textarea>
                          </div>
                          <div class="form-group">
                            <input class="form-control" type="number" name="answer" placeholder="Answer" required>
                          </div>
                          <div class="text-center">
                            <button type="submit" style="margin-left: 30px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Feed</button>
                          </div>
                        </form> 
                        <?php
                          $type = $_POST["type"];
                          if($type=="b"){
                            include "database.php";
                            $question = $_POST["question"];
                            $answer = $_POST["answer"];                            
                            $sql = "insert into numericaldb (question,answer) values ('".$question."',".$answer.");";
                            if ($_POST && $conn->query($sql) === TRUE) {
                                  echo '<p class="h6 text-center" style="color:green;">Feed Successful</p>';
                             } 
                             $conn->close();   
                          }              
                        ?>                       
                      </div>
                      <div class="tab-pane <?php echo $active3;?>" id="tab3">
                        <form name="typec" action="questionfeed.php" method="post">
                          <input type="hidden" name="type" value="c"/>
                          <div class="form-group">
                            <label >Question</label>
                            <textarea name="question" class="form-control" rows="3" required></textarea>
                          </div>
                          <div class="form-group">
                            <label >Enter comma separated options: </label>
                            <textarea name="option" class="form-control" rows="2" required></textarea>
                          </div>
                          <div class="form-group" style="padding:0px ">
                            <input class="form-control" type="number" name="answer" placeholder="Correct Answer Serial Number" required>
                          </div>
                          <div class="text-center">
                            <button type="submit" style="margin-left: 30px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Feed</button>
                          </div>
                        </form> 
                        <?php
                          $type = $_POST["type"];
                          if($type=="c"){
                            include "database.php";
                            $question = $_POST["question"];
                            $option = $_POST["option"];
                            $answer = $_POST["answer"];                            
                            $sql = "insert into dropdown (question,options,answer) values ('".$question."','".$option."','".$answer."');";
                            if ($_POST && $conn->query($sql) === TRUE) {
                                  echo '<p class="h6 text-center" style="color:green;">Feed Successful</p>';
                             } 
                            $conn->close();    
                          }              
                        ?>  
                      </div>
                      <div class="tab-pane <?php echo $active4;?>" id="tab4">
                        <form name="typed" action="questionfeed.php" method="post">
                          <input type="hidden" name="type" value="d"/>
                          <div class="form-group">
                            <label >Question</label>
                            <textarea name="question" class="form-control" rows="5" required></textarea>
                          </div>
                          <div class="form-group">
                            <input class="form-control" type="text" name="answer" placeholder="Answer" required>
                          </div>
                          <div class="text-center">
                            <button type="submit" style="margin-left: 30px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Feed</button>
                          </div>
                        </form> 
                        <?php
                          $type = $_POST["type"];
                          if($type=="d"){
                            include "database.php";                          
                            $question = $_POST["question"];
                            $answer = $_POST["answer"];                           
                            $sql = "insert into fillintheblanks (question,answer) values ('".$question."','".$answer."');";
                            if ($_POST && $conn->query($sql) === TRUE) {
                                  echo '<p class="h6 text-center" style="color:green;">Feed Successful</p>';
                             } 
                             $conn->close();   
                          }              
                        ?>                                   
                      </div>
                      <div class="tab-pane <?php echo $active5;?>" id="tab5">
                        <form name="typee" action="questionfeed.php" method="post">
                          <input type="hidden" name="type" value="e"/>
                          <div class="form-group">
                            <label >Question</label>
                            <textarea name="question" class="form-control" rows="5" required></textarea>
                          </div>                          
                          <div class="text-center">
                            <button type="submit" style="margin-left: 30px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Feed</button>
                          </div>
                        </form> 
                        <?php
                          $type = $_POST["type"];
                          if($type=="e"){
                            include "database.php";                          
                            $question = $_POST["question"];                           
                            $sql = "insert into shortanswer (question) values ('".$question."');";
                            if ($_POST && $conn->query($sql) === TRUE) {
                                  echo '<p class="h6 text-center" style="color:green;">Feed Successful</p>';
                             } 
                             $conn->close();   
                          }              
                        ?>  
                      </div>
                      <div class="tab-pane <?php echo $active6;?>" id="tab6">
                        <form name="typef" action="questionfeed.php" method="post">
                          <input type="hidden" name="type" value="f"/>
                          <div class="form-group">
                            <label >Question</label>
                            <textarea name="question" class="form-control" rows="5" required></textarea>
                          </div>                          
                          <div class="text-center">
                            <button type="submit" style="margin-left: 30px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Feed</button>
                          </div>
                        </form> 
                        <?php
                          $type = $_POST["type"];
                          if($type=="f"){
                            include "database.php";                          
                            $question = $_POST["question"];                           
                            $sql = "insert into essay (question) values ('".$question."');";
                            if ($_POST && $conn->query($sql) === TRUE) {
                                  echo '<p class="h6 text-center" style="color:green;">Feed Successful</p>';
                             } 
                             $conn->close();   
                          }              
                        ?>  
                      </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/moment.min.js"></script>
  <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
  <script src="./assets/js/material-kit.js?v=2.0.4" type="text/javascript"></script>
</body>
</html>