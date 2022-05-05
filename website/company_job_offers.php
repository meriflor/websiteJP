<?php
    include 'config.php';
    session_start();
    $company_id = $_SESSION['company_id'];

    if(!isset($company_id)){
    header('location:login.php');
    };

    if(isset($_POST['createPostButton'])){
        $postTitle = $_POST['title'];
        $postDesc = $_POST['desc'];
        $postReq = $_POST['req'];

        $insert = $conn->prepare("INSERT INTO `company_job_posts`(company_id, post_name, post_desc, post_req) 
        VALUES(?,?,?,?)");
        header('location: company_job_offers.php');
        $insert->execute([$company_id, $postTitle, $postDesc, $postReq]);
        if($insert){
            $message[] = 'registered succesfully!';
        }else{
            echo "Error";
        }

    }

    if(isset($_GET['del_post'])){
        $post_id = $_GET['del_post'];
        $deletePost = $conn->prepare("DELETE FROM `company_job_posts` WHERE post_id = ?");
        $deletePost->execute([$post_id]);
        header('location: company_job_offers.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Offers</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/company_job_offers.css" type="text/css">
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

        <div id="job-posts-container">
            <div id="inner-container">
                <form method="post" action="company_job_offers.php">
                    <input class="input-search" type="text" placeholder="Search...">
                    <input class="input-search-button" type="submit" value="Search">
                    <button id="button" class="input-search-button">Create post</button>
                </form>

                <?php
                    $postInfo = $conn->prepare("SELECT * FROM `company_job_posts` WHERE company_id = ?");
                    $postInfo->execute([$company_id]);
                ?>

                <div class="posts-container"> 
                    <?php while($fetch_postInfo = $postInfo->fetch(PDO::FETCH_ASSOC)){?> 
                    <table class="one-post-content">
                        <tbody>
                            <div class="postDesign">
                                <tr><td class="table-title"><?= $fetch_postInfo['post_name']; ?></td></tr>
                                <tr><td class="table-body"><?= $fetch_postInfo['post_desc']; ?></td></tr>
                                <tr><td class="table-body"><?= $fetch_postInfo['post_req']; ?></td></tr>
                                <tr>
                                    <td class="table-buttons">
                                        <a href="company_job_offers.php?del_post=<?php echo $fetch_postInfo['post_id']; ?>">Delete</a>    
                                    </td>
                                    <td class="table-buttons">
                                        <a href="">Edit</a>
                                    </td>
                                </tr>
                            </div>
                            
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="popup-container" id="pop-window">
            <div class="popup-content">
                <h1>Creating Job Post</h1>
                <img src="icons/close.png" alt="close" class="close-button" id="close">
                <form method="post" enctype="multipart/form-data">
                    <input class="input-box" type="text" placeholder="Title" name="title" required>
                    <textarea name="desc" class="textarea" id="desc" cols="30" rows="10" placeholder="Description" required></textarea>
                    <textarea name="req" id="req" class="textarea" cols="30" rows="10" placeholder="Requirements" required></textarea>
                    <input name="cancelPostButton" class="popup-button" type="submit" value="Cancel">
                    <input name="createPostButton" class="popup-button" type="submit" value="Create">
                </form>
            </div>
        </div>  
        <script>
            var container = document.getElementById("pop-window");
            var btn = document.getElementById("button");
            var closeBtn = document.getElementById("close");

            btn.onclick = function(event){
                event.preventDefault()
                container.style.display = "flex";
            }
            closeBtn.onclick = function(){
                container.style.display = "none";
            }
        </script> 
    </section>
</body>
</html>