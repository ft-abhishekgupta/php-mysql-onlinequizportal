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
    Quiz Configuration
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="./assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
  <script>
    function marks() {
        var xa = document.getElementById("typea").value;
        var ya = document.getElementById("typeamarks").value;
        var ta = +xa*+ya;  
        document.getElementById("totala").innerHTML = ta;
        var xb = document.getElementById("typeb").value;
        var yb = document.getElementById("typebmarks").value; 
        var tb = +xb*+yb;     
        document.getElementById("totalb").innerHTML = tb;
        var xc = document.getElementById("typec").value;
        var yc = document.getElementById("typecmarks").value; 
        var tc = +xc*+yc;     
        document.getElementById("totalc").innerHTML = tc;
        var xd = document.getElementById("typed").value;
        var yd = document.getElementById("typedmarks").value; 
        var td = +xd*+yd;
        document.getElementById("totald").innerHTML = td;
        var xe = document.getElementById("typee").value;
        var ye = document.getElementById("typeemarks").value;
        var te = +xe*+ye;
        document.getElementById("totale").innerHTML = te;
        var xf = document.getElementById("typef").value;
        var yf = document.getElementById("typefmarks").value;
        var tf = +xf*+yf;     
        document.getElementById("totalf").innerHTML = tf;
        document.getElementById("total").innerHTML = ta+tb+tc+td+te+tf;
    }
  </script>
</head>
<body class="login-page sidebar-collapse">
   <?php
    include "database.php";
    $query = "select * from quizconfig;";    
    $result = $conn->query($query);                      
    $totalquiz=$result->num_rows;
    $next=$totalquiz+1;
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
        <div class="col-lg-9 col-md-9 ml-auto mr-auto" >
          <div class="card card-login" >
            <form class="form" name="quizconfig" action="quizconfig.php" method="post" >
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Set Quiz</h4>
              </div>
              <p class="description text-center">Set the pattern of the next quiz</p>
              <div class="card-body" style="padding-left: 20px;padding-right: 20px">
                <div class="row">
                  <div class="col">                   
                    <p class="h5 text-center" >Quiz Number</p>
                  </div>
                  <div class="col">
                    <input type="number" min="0" name="quiznumber" id="quiznumber" class="form-control text-center" value="<?php echo $next; ?>">
                  </div>
                  <div class="col">
                    <p class="h5 text-center">Duration (mins)</p>
                  </div>
                  <div class="col">
                    <input type="number" min="0" name="duration" class="form-control text-center" value="10">
                  </div>
                </div>
              </div>
              <div class="card-body row form-group" style="padding-left: 20px;padding-right: 20px">
                <div class="col">
                  <p class="h5">Start Date and Time for the quiz:</p>
                </div>
                <div class="col">
                  <input type="text" class="form-control datetimepicker" name="starttime" value="01/01/2018"/>  
                </div>       
              </div>
              <div class="card-body" style="padding-left: 20px;padding-right: 20px">
                <div class="row">
                  <div class="col">
                    <p class="h5 text-center">Type</p>
                  </div>
                  <div class="col">
                    <p class="h5 text-center">Number</p>
                  </div>
                  <div class="col">
                    <p class="h5 text-center">Marks for Each</p>
                  </div>
                  <div class="col">
                    <p class="h5 text-center" style="font-style: italic;">Total</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <p class="h6">MCQ :</p>
                  </div>
                  <div class="col">
                    <input type="number" min="0" class="form-control text-center" name="typea" id="typea" value="0" oninput="marks()">
                  </div>
                  <div class="col">
                    <input type="number" min="0" class="form-control text-center" name="typeamarks" id="typeamarks" value="0" oninput="marks()">
                  </div>
                  <div class="col">
                    <p class="h5 text-center" style="font-style: italic;" id="totala">0</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <p class="h6">Numerical :</p>
                  </div>
                  <div class="col">
                    <input type="number" min="0" class="form-control text-center" name="typeb" id="typeb" value="0" oninput="marks()">
                  </div>
                  <div class="col">
                    <input type="number" min="0" class="form-control text-center" name="typebmarks" id="typebmarks" value="0" oninput="marks()">
                  </div>
                  <div class="col">
                    <p class="h5 text-center" style="font-style: italic;" id="totalb">0</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <p class="h6">Drop Down :</p>
                  </div>
                  <div class="col">
                    <input type="number" min="0" class="form-control text-center" name="typec" id="typec" value="0" oninput="marks()">
                  </div>
                  <div class="col">
                    <input type="number" min="0" class="form-control text-center" name="typecmarks" id="typecmarks" value="0" oninput="marks()">
                  </div>
                  <div class="col">
                    <p class="h5 text-center" style="font-style: italic;" id="totalc">0</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <p class="h6">Fill in the blank :</p>
                  </div>
                  <div class="col">
                    <input type="number" min="0" class="form-control text-center" name="typed" id="typed" value="0" oninput="marks()">
                  </div>
                  <div class="col">
                    <input type="number" min="0" class="form-control text-center" name="typedmarks" id="typedmarks" value="0" oninput="marks()">
                  </div>
                  <div class="col">
                    <p class="h5 text-center" style="font-style: italic;" id="totald">0</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <p class="h6">Short Ans type :</p>
                  </div>
                  <div class="col">
                    <input type="number" min="0" class="form-control text-center" name="typee" id="typee" value="0" oninput="marks()">
                  </div>
                  <div class="col">
                    <input type="number" min="0" class="form-control text-center" name="typeemarks" id="typeemarks" value="0" oninput="marks()">
                  </div>
                  <div class="col">
                    <p class="h5 text-center" style="font-style: italic;" id="totale">0</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <p class="h6">Essay type :</p>
                  </div>
                  <div class="col">
                    <input type="number" min="0" class="form-control text-center" name="typef" id="typef" value="0" oninput="marks()">
                  </div>
                  <div class="col">
                    <input type="number" min="0" class="form-control text-center" name="typefmarks" id="typefmarks" value="0" oninput="marks()">
                  </div>
                  <div class="col">
                    <p class="h5 text-center" style="font-style: italic;" id="totalf">0</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <p class="h5">Total Quiz Marks :</p>
                  </div>
                  <div class="col">                    
                  </div>
                  <div class="col">                    
                  </div>
                  <div class="col">                    
                    <p class="h2 text-center" id="total">0</p>
                  </div>
                </div>
              </div>              
              <div class="text-center">
                <button type="submit" style="margin-left: 30px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Set Quiz</button>
              </div>
            </form>
            <?php              
              $quiznumber = $_POST["quiznumber"];
              $typeamarks = $_POST["typeamarks"];
              $typea = $_POST["typea"];
              $typebmarks = $_POST["typebmarks"];
              $typeb = $_POST["typeb"];
              $typecmarks = $_POST["typecmarks"];
              $typec = $_POST["typec"];
              $typedmarks = $_POST["typedmarks"];
              $typed = $_POST["typed"];
              $typeemarks = $_POST["typeemarks"];
              $typee = $_POST["typee"];
              $typefmarks = $_POST["typefmarks"];
              $typef = $_POST["typef"];
              $maxmarks = $typeamarks*$typea+$typebmarks*$typeb+$typecmarks*$typec+$typedmarks*$typed+$typeemarks*$typee+$typefmarks*$typef;
              $duration = $_POST["duration"];
              $starttime = $_POST["starttime"];   
              $sql = "insert into 
              quizconfig (quiznumber,starttime,duration,maxmarks,typea,typeamarks,typeb,typebmarks,typec,typecmarks,typed,typedmarks,typee,typeemarks,typef,typefmarks) values 
              (".$quiznumber.",'".$starttime."','".$duration."',".$maxmarks.",".$typea.",".$typeamarks.",".$typeb.",".$typebmarks.",".$typec.",".$typecmarks.",".$typed.",".$typedmarks.",".$typee.",".$typeemarks.",".$typef.",".$typefmarks.");";
              if ($_POST && $conn->query($sql) === TRUE) {
               echo '<p class="h6 text-center" style="color:green;">Quiz Set Successful</p>';
               $next=$next+1;
               echo '<script>document.getElementById("quiznumber").value = '.$next.';</script>';                   
              } 
              $conn->close();   
            ?>
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
  <script>    
    $(document).ready(function() {
      format : 'DD/MM/YYYY HH:mm'
      materialKit.initFormExtendedDatetimepickers();     
    });   
  </script>
</body>
</html>