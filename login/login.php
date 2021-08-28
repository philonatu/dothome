<?php
  session_start();

  $title = 'Login';
  include('config.php');
  include('log_header.php');
  require_once('log_functions.php');

  // if($_SERVER['REQUEST_METHOD'] == 'POST') {
  //   // echo $_POST['email'];
  //   output($_POST);
  // }
  if(isset($_POST['login'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    if($email == false){
      $status = '이메일 형식에 맞게 입력 요청';
    }
    if(authenticate_user($email, $password)){
      $_SESSION['email'] = $email;
      redirect('login/log_admin.php');
      dir();
    } else {
      $status = '비번이 맞지 않습니다.';
    }
  }
 ?>

 <form class="" action="login/log_admin.php" method="POST">
   <p>
     <label for="email">Email:</label>
     <input type="text" name="email" id="email">
   </p>
   <p>
     <label for="password">Password:</label>
     <input type="password" name="password" id="password">
   </p>
   <p>
     <input type="submit" name="login" value="Login">
   </p>
 </form>
 <div class="error">
   <p>
     <?php
        if(isset($status)){
          echo $status;
        }

      ?>
   </p>
   <p>항상 보안 유념</p>
 </div>

 <?php include('login/log_footer.php'); ?>
