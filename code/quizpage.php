<?php
  session_start();
  if(!isset($_SESSION["studentloggedin"]) || $_SESSION["studentloggedin"] !== true){
      header("location: studentlogin.php");
      exit;
  }
  $rollnumber=$_SESSION["rollnumber"];
  $totalques=$_SESSION["numques"];
  $quiznumber=$_SESSION["quiznumber"];
  
  $n=$_GET['n'];
  if($n==NULL)    
      header("Location: quizpage.php?n=1"); 
  include "database.php";
  if($_POST){
    $n = $_POST['serialnumber'];
    $ans = $_POST['answer'];
    $sql = "update response set ans = '".$ans."' where rollnumber=".$rollnumber." and quiznumber=".$quiznumber." and serialnumber=".$n.";";    
    $result = $conn->query($sql);    
    if($_POST['button']=="savenext"){
      $totalques++;
      $n=($n+1)%$totalques;
      if($n==0)
      $n++;
    }    
    header("Location: quizpage.php?n=".$n);
  }   
  $sql = "select * from response where rollnumber=".$rollnumber." and quiznumber=".$quiznumber." and serialnumber=".$n.";";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $type = $row["type"];
  $quesid = $row["quesid"];
  $inputans=$row["ans"];
  $marks=$row["quesmarks"];
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
    $question="";
    $optiona="";
    $optionb="";
    $optionc="";
    $optiond="";
    $options="";
    if($type=="a"){
      $active1="active"; $active2=""; $active3=""; $active4=""; $active5=""; $active6="";
      $sql = "select * from mcqdb where id=".$quesid.";";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $question=$row["question"];
      $optiona=$row["optiona"];
      $optionb=$row["optionb"];
      $optionc=$row["optionc"];
      $optiond=$row["optiond"];      
      if($inputans=="A"){
        $s1="checked"; $s2=""; $s3=""; $s4="";
      }elseif($inputans=="B"){
        $s1=""; $s2="checked"; $s3=""; $s4="";
      }elseif($inputans=="C"){
        $s1=""; $s2=""; $s3="checked"; $s4="";
      }elseif($inputans=="D"){
        $s1=""; $s2=""; $s3=""; $s4="checked";
      }     
    }
    elseif($type=="b"){
      $active1=""; $active2="active"; $active3=""; $active4=""; $active5=""; $active6="";
      $sql = "select * from numericaldb where id=".$quesid.";";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $question=$row["question"];      
    }
    elseif($type=="c"){
      $active1=""; $active2=""; $active3="active"; $active4=""; $active5=""; $active6="";
      $sql = "select * from dropdown where id=".$quesid.";";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $question=$row["question"];
      $options=$row["options"];
      $list=explode(',', $options);
      $listlen=count($list);
    }
    elseif($type=="d"){
      $active1=""; $active2=""; $active3=""; $active4="active"; $active5=""; $active6="";
      $sql = "select * from fillintheblanks where id=".$quesid.";";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $question=$row["question"];      
    }
    elseif($type=="e"){
      $active1=""; $active2=""; $active3=""; $active4=""; $active5="active"; $active6="";
      $sql = "select * from shortanswer where id=".$quesid.";";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $question=$row["question"];      
    }
    elseif($type=="f"){
      $active1=""; $active2=""; $active3=""; $active4=""; $active5=""; $active6="active";
      $sql = "select * from essay where id=".$quesid.";";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $question=$row["question"];      
    }
  ?>
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">    
        <a class="navbar-brand" href="studenthome.php">
        Quiz <?php echo $quiznumber;?> (Roll Number : <?php echo $rollnumber;?>) 
        </a> 
        <form method="post" action="submit.php"> 
          <button  style="" type="submit" name="button" value="submitquiz" class="btn btn-success float-right"> Submit Quiz     
        </form>       
    </div>
  </nav>
  <div class="page-header header-filter" style="background-image: url('./assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row" style="margin-top: 100px">
        <div class="col-lg-10 col-md-10 ml-auto mr-auto">
          <div class="card card-login" style="height: 590px">            
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Question <?php echo $n." / ".$totalques;?> ( Marks : <?php echo $marks;?> )</h4>
              </div>
              <p class="description text-center">Best of luck!!!</p>
              <div class="row" style="padding: 20px">
                <div class="col-md-4">
                  <ul class="nav nav-pills nav-pills-rose flex-column">
                    <li class="nav-item"><a class="nav-link disabled <?php echo $active1;?>" href="#tab1" data-toggle="tab">MCQ Questions</a></li>
                    <li class="nav-item"><a class="nav-link disabled <?php echo $active2;?>" href="#tab2" data-toggle="tab">Numerical Type</a></li>
                    <li class="nav-item"><a class="nav-link disabled <?php echo $active3;?>" href="#tab3" data-toggle="tab">Drop Down</a></li>
                    <li class="nav-item"><a class="nav-link disabled <?php echo $active4;?>" href="#tab4" data-toggle="tab">Fill in the blank</a></li>
                    <li class="nav-item"><a class="nav-link disabled <?php echo $active5;?>" href="#tab5" data-toggle="tab">Short Answer Type</a></li>
                    <li class="nav-item"><a class="nav-link disabled <?php echo $active6;?>" href="#tab6" data-toggle="tab">Essay Type</a></li>
                  </ul>
                  <form action="jump.php" method="post">     
                    <div class="form-group text-center row">
                      <div class="col">
                      <input class="form-control" type="number" style="margin-left:15px;width:150px;" name="jump" placeholder="Jump to Question" min="1" max="<?php echo $totalques;?>">
                      </div>
                      <div class="col">
                      <button type="submit" style="margin:0px" name="button" value="save" class="btn btn-primary btn-round">Go</button>
                    </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-8" style="padding-right:40px ">
                  <div class="tab-content">
                      <div class="tab-pane <?php echo $active1;?>" id="tab1">
                        <h4 class="title" style="margin:0px;color: black"><?php echo $question;?></h4><br>
                        <form name="typea" action="quizpage.php" method="post"> 
                          <input type="hidden" name="type" value="a"/> 
                          <input type="hidden" name="serialnumber" value="<?php echo $n;?>"/>
                          <div class="form-check form-check-radio" style="margin: 5px;padding: 5px">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio"  id="inlineRadio1" name="answer" value="A" <?php echo $s1;?> ><b> <?php echo $optiona;?> </b>
                              <span class="circle">
                                  <span class="check"></span>
                              </span>
                            </label>
                          </div>
                          <div class="form-check form-check-radio" style="margin: 5px;padding: 5px">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" id="inlineRadio2" name="answer" value="B" <?php echo $s2;?>><b> <?php echo $optionb;?></b>
                              <span class="circle">
                                  <span class="check"></span>
                              </span>
                            </label>
                          </div>
                          <div class="form-check form-check-radio" style="margin: 5px;padding: 5px">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" id="inlineRadio3"  name="answer" value="C" <?php echo $s3;?>><b> <?php echo $optionc;?></b>
                              <span class="circle">
                                  <span class="check"></span>
                              </span>
                            </label>
                          </div>
                          <div class="form-check form-check-radio" style="margin: 5px;padding: 5px">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" id="inlineRadio3"  name="answer" value="D" <?php echo $s4;?>><b> <?php echo $optiond;?></b>
                              <span class="circle">
                                  <span class="check"></span>
                              </span>
                            </label>
                          </div>                          
                          <div class="text-center">
                            <button type="submit" name="button" value="save" style="margin-left: 30px;margin-top: 30px;margin-right: 10px;margin-bottom: 15px;" class="btn btn-primary btn-round">Save</button>
                            <button type="submit" name="button" value="savenext" style="margin-left: 10px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Save & Next</button>
                          </div>
                        </form>                         
                      </div>
                      <div class="tab-pane <?php echo $active2;?>" id="tab2">
                        <h4 class="title" style="margin:0px;color: black"><?php echo $question;?></h4>
                        <form name="typeb" action="quizpage.php" method="post">
                          <input type="hidden" name="type" value="b"/>
                          <input type="hidden" name="serialnumber" value="<?php echo $n;?>"/>
                          <div class="form-group">
                            <input class="form-control" value=<?php echo '"'.$inputans.'"';?> type="number" name="answer" placeholder="Answer">
                          </div>
                          <div class="text-center">
                            <button type="submit" name="button" value="save" style="margin-left: 30px;margin-top: 30px;margin-right: 10px;margin-bottom: 15px;" class="btn btn-primary btn-round">Save</button>
                            <button type="submit" name="button" value="savenext" style="margin-left: 10px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Save & Next</button>
                          </div>
                        </form>                                             
                      </div>
                      <div class="tab-pane <?php echo $active3;?>" id="tab3">
                        <h4 class="title" style="margin:0px;color: black"><?php echo $question;?></h4>
                        <form name="typec" action="quizpage.php" method="post">
                          <input type="hidden" name="type" value="c"/>
                          <input type="hidden" name="serialnumber" value="<?php echo $n;?>"/>
                          <div class="input-group">                            
                            <select id="inputState" name="answer" class="form-control">
                              <?php
                                for ($i=0; $i < $listlen; $i++) { 
                                  $t=$i+1;
                                  if($t==$inputans)
                                    echo '<option  selected value="'.$t.'" style="color: black">'.$list[$i].'</option>';
                                  else
                                    echo '<option  value="'.$t.'"style="color: black">'.$list[$i].'</option>';
                                }
                              ?>                              
                            </select>
                          </div>
                          <div class="text-center">
                            <button type="submit" name="button" value="save" style="margin-left: 30px;margin-top: 30px;margin-right: 10px;margin-bottom: 15px;" class="btn btn-primary btn-round">Save</button>
                            <button type="submit" name="button" value="savenext" style="margin-left: 10px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Save & Next</button>
                          </div>
                        </form>                         
                      </div>
                      <div class="tab-pane <?php echo $active4;?>" id="tab4">
                        <h4 class="title" style="margin:0px;color: black"><?php echo $question;?></h4>
                        <form name="typed" action="quizpage.php" method="post">
                          <input type="hidden" name="type" value="d"/>
                          <input type="hidden" name="serialnumber" value="<?php echo $n;?>"/>
                          
                          <div class="form-group">
                            <input class="form-control" value=<?php echo '"'.$inputans.'"';?> type="text" name="answer" placeholder="Answer">
                          </div>
                          <div class="text-center">
                            <button type="submit" name="button" value="save" style="margin-left: 30px;margin-top: 30px;margin-right: 10px;margin-bottom: 15px;" class="btn btn-primary btn-round">Save</button>
                            <button type="submit" name="button" value="savenext" style="margin-left: 10px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Save & Next</button>
                          </div>
                        </form>                                                      
                      </div>
                      <div class="tab-pane <?php echo $active5;?>" id="tab5">
                        <h4 class="title" style="margin:0px;color: black"><?php echo $question;?></h4><br>
                        <form name="typee" action="quizpage.php" method="post">
                          <input type="hidden" name="type" value="e"/>
                          <input type="hidden" name="serialnumber" value="<?php echo $n;?>"/>
                          <div class="form-group">
                            <label >Answer</label>
                            <textarea name="answer" class="form-control" rows="5"><?php echo $inputans;?></textarea>
                          </div>                          
                          <div class="text-center">
                            <button type="submit" name="button" value="save" style="margin-left: 30px;margin-top: 30px;margin-right: 10px;margin-bottom: 15px;" class="btn btn-primary btn-round">Save</button>
                            <button type="submit" name="button" value="savenext" style="margin-left: 10px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Save & Next</button>
                          </div>
                        </form>                         
                      </div>
                      <div class="tab-pane <?php echo $active6;?>" id="tab6">
                        <h4 class="title" style="margin:0px;color: black"><?php echo $question;?></h4><br>
                        <form name="typef" action="quizpage.php" method="post">
                          <input type="hidden" name="type" value="f"/>
                          <input type="hidden" name="serialnumber" value="<?php echo $n;?>"/>
                          <div class="form-group">
                            <label >Answer</label>
                            <textarea name="answer" class="form-control" rows="10"><?php echo $inputans;?></textarea>
                          </div>                          
                          <div class="text-center">
                            <button type="submit" name="button" value="save" style="margin-left: 30px;margin-top: 30px;margin-right: 10px;margin-bottom: 15px;" class="btn btn-primary btn-round">Save</button>
                            <button type="submit" name="button" value="savenext" style="margin-left: 10px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Save & Next</button>
                          </div>
                        </form>                         
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