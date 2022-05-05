<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Job Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    
  </head>
  <body>
    <nav>
      <label class="logo"> 
        <span>JOB</span> PORTAL
      </label>

      <?php $page=basename($_SERVER['PHP_SELF']); ?>
      <ul class="nav navbar-nav">
        <li class="<?php if ($page=='home'){echo 'active';}?>"><a href="home.php">Home</a></li>
        <li class="<?php if($page=='login/signup'){echo 'active';}?>"><a href="login.php">Login/signup</a></li>
        <li class="<?php if($page=='Company'){echo 'active';}?>"><a href="about.php">About us</a></li>
        <li class="<?php if($page=='contact'){echo 'active';}?>"><a href="contact.php">Contact us</a></li>
      </ul>
    </nav>
 <section></section>
  </body>
</html>