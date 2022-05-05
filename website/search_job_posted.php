<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searching Job</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/search.css" type="text/css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                    <label class="logo"> <span>JOB</span> PORTAL SEARCH</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Post Name</th>
                                    <th>Post Description</th>
                                    <th>Post Requirements</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                    <tr>
                                        <td>Ratatat</td>
                                        <td>Manager</td>
                                        <td>Lorem ipsum</td>
                                        <td>Kikitiw</td>
                                    </tr>
                                    <tr>
                                        <td>afdgafrg</td>
                                        <td>Manawwtwtwtwtger</td>
                                        <td>Loremere3dcvs arg afdga  ipsum</td>
                                        <td>Kikiafgadfghtiw</td>
                                    </tr>
                                    <tr>
                                        <td>gggggggggggggsd sRatatat</td>
                                        <td>Mansdfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgager</td>
                                        <td>Loreadfad fasdf adfm ipsum</td>
                                        <td>Kikwe4r awdfzsfgag afg aergt argafg afgitiw</td>
                                    </tr>
                                <!--<tr>
                                    <td colspan="4">No Record Found</td>
                                </tr>-->
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>