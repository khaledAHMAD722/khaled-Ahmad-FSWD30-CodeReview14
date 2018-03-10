<?php
  ob_start();
  session_start();




  require_once 'actions/db_coonect.php';


  $error = false;

    $user_email= "";

    $user_pass= "";

    $emailError="";

    $passError="";

  if( isset($_POST['btn-login']) ) {
    // prevent sql injections/ clear user invalid inputs
    $user_email = trim($_POST['email']);
    $user_email = strip_tags($user_email);
    $user_email = htmlspecialchars($user_email);

    $user_pass = trim($_POST['pass']);
    $user_pass = strip_tags($user_pass);
    $user_pass = htmlspecialchars($user_pass);
  
    // prevent sql injections / clear user invalid inputs
    if(empty($user_email)){
      $error = true;
      $emailError = "Please enter your email address.";
    } else if ( !filter_var($user_email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    }
    if(empty($user_pass)){
      $error = true;
      $passError = "Please enter your password.";
    }
    // if there's no error, continue to login
    if (!$error) {

      $query = "SELECT * FROM admin WHERE email='$user_email'";
      $res = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($res);
      $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
      
      // print_r($row); Use it for a fast check to see what is included in $row assoc array!
      
      if( $count != 1 ) {
        $errMSG = "This email is not registered";
      } else if ($row['user_pass']==$password) {
        $_SESSION['user'] = $row['id'];
        header("Location: admin.php");
      } else {
        $errMSG = "Incorrect Password, Try again...";
      }
    }
  }


?>

<!-- HTML================================= -->

<!-- html/head/<body> -->
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
</head>
<body>

<div class="container">
  
  <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form class="form-control" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <h2>Log In.</h2>
        <hr />
        <?php
          if ( isset($errMSG) ) {
        ?>

          <div class="alert text-danger">
            <?php echo $errMSG; ?>
          </div>

        <?php
        }
        ?>
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="email"><span class="glyphicon glyphicon-user"><?php echo $emailError; ?></span> Username</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"><?php echo $passError; ?></span> Password</label>
              <input type="password" name="pass" class="form-control" id="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block" name="btn-login"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
           <?php 
      if( isset($_GET['success'])) { ?>
        <div class="alert alert-success">
          <strong>Successfully registered</strong>
        </div>
      <?php 
        }
      ?>
        </div>
      </div>
      </form>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>

  

 

<br>


<?php ob_end_flush(); ?>