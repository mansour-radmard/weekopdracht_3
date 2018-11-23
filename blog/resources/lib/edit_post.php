<?php
include_once "config.php";

if (isset($_GET['submit'])) {

   $id = $_GET['id'];
   $edit_title = htmlentities($_GET['edit-title']);
   $edit_content = htmlentities($_GET['edit-post']);

   $sql = "UPDATE posts SET title='$edit_title', content='$edit_content' WHERE ID ='$id'";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header('Location: ../../index.php');
   } else {
      echo "not inserted";
   }
}
