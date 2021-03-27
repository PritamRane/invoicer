<?php

    require "connect.php";

    
    // USER SIGN IN PHP
    if(isset($_POST['submitUserLogin'] )){

        $email = $_POST['emailUserLogin'];
        $password = $_POST['passwordUserLogin'];
        $sql = "SELECT * FROM client WHERE `email`='$email' AND `password` ='$password'";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);
            
            echo '<script>alert("Login Successful")</script>';
            header("refresh: 0; url=client.php");
        } else {
          
            echo '<script>alert("invalid Password Email or Password")</script>';
            header("refresh: 0; url=index.php");
        }

    
    }



    // ADMIN LOGIN
    if(isset($_POST['submit'] )){

        $email = $_POST['emailAdmin'];
        $password = $_POST['passwordAdmin'];
        $sql = "SELECT * FROM admin WHERE `email`='$email' AND `password` ='$password'";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);
            
            echo '<script>alert("Login Successful")</script>';
            header("refresh: 0; url=admin.php");
        } else {
        
            echo '<script>alert("invalid Password Email or Password")</script>';
            header("refresh: 0; url=index.php");
        }

    
    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Invoicing Software</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<style>

img {
    float: left;
    width:  100px;
    height: 91.5vh;
    object-fit: cover;
}

</style>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Client Invoicing Software</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      
        <div class="d-grid gap-2 d-md-flex justify-content-md-end ms-auto">


        <!-- ADMIN -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#admin">
                Admin
                </button>

                <!-- Modal -->
                <div class="modal fade" id="admin" tabindex="-1" aria-labelledby="admin" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"  id="admin">Admin Login</h5>
                        <button type="button" style="margin-left: 0px;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="emailAdmin" class="form-label">Email address</label>
                                <input type="email" name="emailAdmin" class="form-control" id="emailAdmin" aria-describedby="emailHelp" required>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="passwordAdmin" class="form-label">Password</label>
                                <input type="password" name="passwordAdmin" class="form-control" id="passwordAdmin" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>


                        
                        


                    </div>
                    
                    </div>
                </div>
            </div>













            <!-- USER -->
            
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#user">
            User
            </button>

            <!-- Modal -->
            <div class="modal fade" id="user" tabindex="-1" aria-labelledby="user" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="user">User</h5>
                    <button type="button" style="margin-left: 0px;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="d-flex justify-content-center">
                    
                        <ul class="nav nav-pills " id="pills-tab" role="tablist">
                            <li class="nav-item px-1" role="presentation">
                                <button class="nav-link px-5 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-5" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Register</button>
                            </li>
                        </ul>
                    
                    </div>
                    
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        
                        
                            <form class="mt-5" action="" method="POST">
                                <div class="mb-3">
                                    <label for="emailUserLogin" class="form-label">Email address</label>
                                    <input type="email" name="emailUserLogin" class="form-control" id="emailUserLogin" aria-describedby="emailHelp" required>
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordUserLogin" class="form-label">Password</label>
                                    <input type="password" name="passwordUserLogin" class="form-control" id="passwordUserLogin" required>
                                </div>
                                <button type="submit" name="submitUserLogin" class="btn btn-primary">Submit</button>
                            </form>
                            
                            
                        
                        
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        
                        
                            <form class="mt-5 mx-auto" action="" method="POST" >
                                <div class="mb-3 row">
                                    <div class="col">

                                        <label for="name" class="form-label">First Name</label>
                                        <input type="text" name="fname" required class="form-control" id="name" placeholder="First name" aria-label="First name">
                                    
                                    </div>
                                    <div class="col">
                                        <label for="lastname" class="form-label">Last Name</label>
                                        <input type="text" name="lname" required class="form-control" id="lastname" placeholder="Last name" aria-label="Last name">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="emailUser" class="form-label">Email address</label>
                                    <input type="email" name="emailUser" class="form-control" id="emailUser" aria-describedby="emailHelp" required>
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordUser" class="form-label">Password</label>
                                    <input type="password" name="passwordUser" class="form-control" id="passwordUser" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text-area" name="address" class="form-control" id="address" required>
                                </div>
                                <div class="mb-3">
                                    <label for="number" class="form-label">Mobile Number</label>
                                    <input type="text-area" name="number" class="form-control" id="number" required>
                                </div>
                                <div class="mb-3">
                                    <label for="dropdown" class="form-label">type</label>
                                        <select  name="dropdown" class="form-control dropdown-toggle" id="dropdown" required>
                                            <option value="individual" selected>Individual</option>
                                            <option value="corporate">Corporate</option>
                                        </select>
                                </div>
                                <input type="submit" name="submitUser" class="btn btn-primary" value="Sign In">
                            </form>

                            <!-- PHP FOR USER SIGN UP -->
                            <?php
                            
                                if(isset($_POST['submitUser'])){

                                    $email = $_POST['emailUser'];
                                    $password = $_POST['passwordUser'];
                                    $fname = $_POST['fname'];
                                    $lname = $_POST['lname'];
                                    $address = $_POST['address'];
                                    $number = $_POST['number'];
                                    $dropdown = $_POST['dropdown'];
                                   

                                    $sql = "INSERT INTO `client`( `fname`, `lname`, `email`, `password`, `address`, `number`, `type`) VALUES ('$fname','$lname','$email','$password','$address','$number','$dropdown')";
                                    $result = mysqli_query($conn, $sql);
                                   
                                    

                                }
                         
                            
                            ?>
                        
                        </div>
                        
                    </div>
                </div>
                
                </div>
            </div>
            </div>




        </div>
      
    </div>
  </div>
</nav>

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="2000">
      <img src="img/3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/1.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/2.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>   
</body>
</html>