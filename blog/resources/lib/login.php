<?php
session_start();
include_once "config.php";

if (isset($_POST['submit'])) {

   $username = $_POST['username'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM users WHERE username='$username' AND password= '$password'";

   $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) == 1) {
         $row = mysqli_fetch_assoc($result);
         $_SESSION['username'] = $row['username'];
         $_SESSION['first_name'] = $row['first_name'];
         $_SESSION['last_name'] = $row['last_name'];
         $_SESSION['email'] = $row['email'];
         $_SESSION['user_id'] = $row['user_id'];
         $_SESSION['role'] = $row['role'];
         $_SESSION['logged'] = true;
         header('Location: ../../index.php');
      } else {
         echo "This username does not exist in the database";
      }

}  else {
    header('Location: ../../index.php');
}
