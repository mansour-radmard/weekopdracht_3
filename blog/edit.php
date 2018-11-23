<?php
include_once "resources/lib/config.php";

$id = $_GET['edit_id'];

$editSql = "SELECT * FROM posts WHERE id='$id'";

$result = mysqli_query($conn, $editSql);

$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Important meta tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Title -->
  <title>Blog</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="#">

  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300i,400,400i,700,700i,800,800i|PT+Sans:400,700,700i" rel="stylesheet">

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
  <link rel="stylesheet" type="text/css" href="resources/css/style.css">
  <link rel="stylesheet" type="text/css" href="resources/css/queries.css">

</head>

<body>
<header>
   <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top nav-custom">
      <div class="container">
        <a class="navbar-brand" href="#">
          Blog <i class="fab fa-blogger"></i> </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link smooth-scroll" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link smooth-scroll" href="post.php">New-post</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link smooth-scroll" href="login_page.php">Login <i class="fas fa-user-lock"></i></a>
                </li>
              </ul>
            </div>
      </div>
    </nav>
</header>

<div class="container">
   <div class="row text-center">
      <div class="col-md-12">
         Blog / CodeGorilla
      </div>
   </div>
   <div class="row text-center">
      <div class="col-md-12">
         <div>
            <h1>Begin aan een nieuw leven als <br />IT-professional samen met CodeGorilla.</h1>
         </div>
      </div>
   </div>
   <div class="row text-center">
      <div class="col-md-12">
         <h6 id="name">Written by <br/>
         Mansour Radmard</h6>
         <h6 id="date">13.11.2018</h6>
      </b/>
      </div>
   </div>

   <div class="row">
      <div class="col-md-6 offset-md-3">
         <div class="item-box">
            <form action="resources/lib/edit_post.php" method="GET">
               <input name="id" style="display: none;" value="<?php echo $row['id']; ?>"/>
              <div class="form-group">
                <label for="title">Update title</label>
                <input type="text" class="form-control" id="edit-title" name="edit-title" value="<?php echo $row['title']; ?>">
              </div>
              <div class="form-group">
                <label for="new-post">Update post</label>
               <textarea class="form-control" type="text" id="edit-post" name="edit-post" value=""><?php echo $row['content']; ?></textarea>
              </div>
              <button type="submit" class="btn btn-info" name="submit">Update</button>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script src="resources/js/custom.js"></script>

<!-- Ajax call function to delete a blog post-->

</body>
</html>
