<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Registration
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="./assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
  <script>
  function validate() {
      var password1 = document.forms["register"]["password"].value;
      var password2 = document.forms["register"]["repassword"].value;
      if(password1==password2)
        return true;
      else{
        alert("Passwords do not match");
        return false;
      }     
  }
  </script>
</head>

<body class="login-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="studentlogin.php">
          Genesis Student's Portal </a>        
      </div>      
    </div>
  </nav>
  <div class="page-header header-filter" style="background-image: url('./assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row" style="margin-top: 100px">
        <div class="col-lg-7 col-md-9 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" name="register" action="studentregister.php" method="post" onsubmit="return validate()">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Register</h4>
              </div>
              <p class="description text-center">If not already registered. Else directly login.</p>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="name" placeholder="Name.." required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email.." required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">format_list_numbered</i>
                    </span>
                  </div>
                  <input type="number" name="rollnumber" class="form-control" placeholder="Roll Number.." required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Password..">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="repassword" class="form-control" placeholder="Retype Password..">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">category</i>
                    </span>
                  </div>
                  <select id="inputState" name="department" class="form-control">
                    <option selected>Select Department</option>
                    <option value="cse">Computer Science</option>
                    <option value="ee">Electrical</option>
                    <option value="ec">Electronics</option>
                    <option value="me">Mechanical</option>
                    <option value="ce">Civil</option>
                  </select>
                </div>
                <div class="input-group" >
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">school</i>
                    </span>
                  </div>
                  <div class="form-check form-check-radio form-check-inline" style="margin: 0px;padding: 0px">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio"  id="inlineRadio1" name="program" value="btech" checked> B.Tech.
                      <span class="circle">
                          <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <div class="form-check form-check-radio form-check-inline" style="margin: 0px;padding: 0px">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" id="inlineRadio2" name="program" value="mtech"> M.Tech.
                      <span class="circle">
                          <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <div class="form-check form-check-radio form-check-inline" style="margin: 0px;padding: 0px">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" id="inlineRadio3"  name="program" value="msc"> M.Sc.
                      <span class="circle">
                          <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <div class="form-check form-check-radio form-check-inline" style="margin: 0px;padding: 0px">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" id="inlineRadio3"  name="program" value="phd"> Phd.
                      <span class="circle">
                          <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <a class="btn btn-primary btn-link" href="studentlogin.php" style="margin-left: 30px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;">Login</a>
                <button type="submit" style="margin-left: 30px;margin-top: 30px;margin-right: 30px;margin-bottom: 15px;" class="btn btn-primary btn-round">Register</button>
              </div>
            </form>
            <?php
              include "database.php";
              $name = $_POST["name"];
              $email = $_POST["email"];
              $rollnumber = $_POST["rollnumber"];
              $password = $_POST["password"];
              $department = $_POST["department"];
              $program = $_POST["program"];
              $sql = "insert into 
              studentinfo (name,email,rollnumber,password,department,program) values 
              ('".$name."','".$email."',".$rollnumber.",'".$password."','".$department."','".$program."');";

              if ($_POST && $conn->query($sql) === TRUE) {
                   echo '<p class="h6 text-center" style="color:green;">Registration Successful</p>';
              } 
              $conn->close();   
            ?>
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