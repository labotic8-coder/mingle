<?php

session_start();
require "../conn.php";
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $select_from_db = "SELECT * from  admins WHERE email = '$email' && password = '$password'";
  $select_from_db_exec = mysqli_query($conn,$select_from_db);
  if ($select_from_db_exec) {
    $number_of_users= mysqli_num_rows($select_from_db_exec);
    if ($number_of_users==1) {
      $admin = mysqli_fetch_assoc($select_from_db_exec);
       $_SESSION['email'] = $admin['email'];
         $_SESSION['id'] = $admin['id'] ;  
        
 echo "<script>window.location.href='index.php';</script>";


    }else {
      echo "user not found";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Diva</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f2f2f2;
    }
    .login-box {
      max-width: 400px;
      margin: 100px auto;
      padding: 30px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>



<!-- Login Form -->
<div class="login-box">
  <h3 class="text-center mb-4">Login to Your Account</h3>

  <form action="login.php" method="POST">
    <div class="mb-3">
      <label class="form-label"> Email</label>
      <input type="text" name="email" class="form-control" placeholder="Enter email  " required>
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
    </div>

<input type="submit" class="bg-dark text-white form-control" name="submit" >
    <p class="text-center mt-3">
      Don't have an account? <a href="sign-up.php">Register here</a>
    </p>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
