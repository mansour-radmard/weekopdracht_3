<?php
// Server and database configuration
include_once("config.php");

// When new post is submitted and fields are not empty
if (isset($_POST["submit"]) && !empty($_POST["title"]) && !empty($_POST["new-post"])) {

   $title = mysqli_real_escape_string($conn, $_POST["title"]);
   $new_post = mysqli_real_escape_string($conn, $_POST["new-post"]);

   $query = "INSERT INTO posts (`title`, `content`) VALUES ('$title', '$new_post')";

   // perfoms the mysql query on databse with given database and server configuration
   $result = mysqli_query($conn, $query);

   // In case new post inserted into the database redirect back to the index
   if ($result) {
      header('Location: ../../index.php');
   } else {
      echo 'Not inserted';
   }
}
