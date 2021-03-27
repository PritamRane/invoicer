<?PHP

    require "connect.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                                    <label for="type" class="form-label">type</label>
                                        <select name="type" class="form-control dropdown-toggle" id="dropdown" required>
                                            <option value="individual">Individual</option>
                                            <option value="corporate">Corporate</option>
                                        </select>
                                </div>
                                <input type="submit" name="submitUser" class="btn btn-primary" value="Sign In">
                            </form>
</body>
</html>


<?php
                            
                                if(isset($_POST['submitUser'])){

                                    $email = $_POST['emailUser'];
                                    $password = $_POST['passwordUser'];
                                    $fname = $_POST['fname'];
                                    $lname = $_POST['lname'];
                                    $address = $_POST['address'];
                                    $number = $_POST['number'];
                                    $dropdown = $_POST['type'];
                                    echo "$email";
                                    echo "$email";
                                    echo "$email";

                                    $sql = "INSERT INTO `client`( `fname`, `lname`, `email`, `password`, `address`, `number`, `type`) VALUES ('$fname','$lname','$email','$password','$address','$number','$dropdown')";
                                    $result = mysqli_query($conn, $sql);
                                    
                                        
                                    if(!$result){
                                        echo '<script>alert("Registerd")</script>';
                                    
                                        
                                    
                                    }    

                                }
                         
                            
                            ?>