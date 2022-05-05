<?php

include 'config.php';

session_start();

$company_id = $_SESSION['company_id'];

if(!isset($company_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>company page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<h1 class="title"> <span>JOB</span> PORTAL </h1>

   <section class="profile-container">

      <?php
         $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_profile->execute([$company_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>

      <div class="profile">
         <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <a href="admin\" class="btn">Chatbox</a>
         <a href="company_job_offers.php" class="btn">Jobs offers</a>
         <a href="admin\" class="btn">Applicants</a>
         <a href="search.php" class="btn">Search Applicants</a>
         <a href="company_profile_update.php" class="btn">Manage Account</a>
         <a href="logout.php" class="delete-btn">logout</a>
      
      </div>

   </section>

</body>
</html>