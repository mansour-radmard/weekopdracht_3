<?php
session_start();
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
              <?php if ($_SESSION['logged']) {?>
                <li class="nav-item">
                  <a class="nav-link smooth-scroll" href="post.php">New-post</a>
                </li>
              <?php }?>
              <?php if ($_SESSION['role'] == 'admin') {?>
                <li class="nav-item">
                  <a class="nav-link smooth-scroll" href="admin.php">Admin</a>
                </li>
              <?php }?>
              <?php if ($_SESSION['logged']) {?>
                <li>
                  <a class="nav-link smooth-scroll" onclick="logout()" >Logout <i class="fas fa-sign-out-alt"></i>
                  </a>
                </li>
              <?php } else {?>
                <li>
                 <a class="nav-link smooth-scroll" href="login_page.php">Login <i class="fas fa-user-lock"></i>
                  </a>
                </li>
              <?php }?>
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
         <div class="blog-title">
            <h1>Begin aan een nieuw leven als <br />IT-professional samen met CodeGorilla.</h1>
         </div>
      </div>
   </div>
   <div class="row text-center row-bottom-space">
      <div class="col-md-12">
         <h6 id="name">Written by <br/>
         Mansour Radmard</h6>
         <h6 id="date">13.11.2018</h6>
      </b/>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6 offset-md-3">
         <form action="resources/lib/send_post.php" method="post">
           <div class="form-group">
             <label for="title">Blog title</label>
             <input type="text" class="form-control" id="title" name="title">
           </div>
           <div class="form-group">
             <label for="new-post">New post</label>
            <textarea class="form-control" type="text" id="new-post" name="new-post"></textarea>
           </div>
           <button type="submit" class="btn btn-info" name="submit">Submit</button>
         </form>
      </div>
   </div>
</div>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script src="resources/js/custom.js"></script>

<script>
   // logout function
   function logout() {
      location.href = "resources/lib/logout.php"
   }
</script>
</body>
</html>
