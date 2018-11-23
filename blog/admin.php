<?php
session_start();

include_once "resources/lib/config.php"; // Server and database configuration

$query = "SELECT * FROM users ORDER BY user_id ASC"; // Select all users

// perfoms the mysql query on databse with given database and server configuration
$result = mysqli_query($conn, $query);

// Check number of rows received from database
$resultCheck = mysqli_num_rows($result);

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
  <?php if ($_SESSION['logged']) {?>
    <div class="alert alert-primary text-center" role="alert">
        <?php echo "You are logged in as" . " " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " " . "you are" . " " . $_SESSION['role'];?>
    </div>
  <?php }?>
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
        <?php if ($_SESSION['logged']) {?>
         <h6 id="name">Welcome <br/>
         <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?></h6>
         <?php }?>
         <h6 id="date">
          <?php echo "Today is" . " " . date("d.m.y"); ?>
        </h6>
      </b/>
      </div>
   </div>

   <table class="table">
      <thead>
         <tr>
           <th scope="col">Firstname</th>
           <th scope="col">Lastname</th>
           <th scope="col">Username</th>
           <th scope="col">Email</th>
           <th scope="col">Role</th>
           <th scope="col">#</th>
         </tr>
      </thead>
      <tbody>
          <?php
          // If number of rows are bigger than 0
         if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) { // convert the received datatype object into associative array (value=>key) pair
         ?>
         <tr>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td><button class="btn btn-danger" onclick="deleteUser(<?php echo $row['user_id']; ?>)">Delete</button></td>
         </tr>
         <?php
         }
         }
         ?>
      </tbody>
   </table>
     <a href="add_user.php"><button class="btn btn-info">Add new user</button></a>
</div>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script src="resources/js/custom.js"></script>

<!-- Ajax call function to delete a blog post-->
<script>
   // Ajax call function, calls php delete script with the id of the post as a parameter in the function
   function deleteUser(id){
      if(confirm('Are you sure to delete this user?')){
         $.ajax({
            type: 'POST',
            url: 'resources/lib/delete_user.php',
            data: {
               delete_id: id
            }
         });
      }
      
      location.reload(); // reload the page after delete is completed
   }

   // logout function
   function logout() {
      location.href = "resources/lib/logout.php"
   }
</script>

</body>
</html>
