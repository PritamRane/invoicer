<?PHP


    require "connect.php";
    session_start();


    if(isset($_POST['submit'])){

        $id = $_SESSION['clientID'];
        $sql = "INSERT INTO `cases` (`clientID`) VALUES ('$id')";
        $result = mysqli_query($conn, $sql);
        $sql = "SELECT caseID
        FROM cases
        WHERE clientID = '$id'
        ORDER BY caseID DESC";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $_SESSION['caseID'] = $row['caseID'];
        header("refresh: 0; url=case.php");
        

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script>

        function showUser(str) {
            if (str=="") {
            document.getElementById("txtHint").innerHTML="";
            return;
            }
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("txtHint").innerHTML=this.responseText;
            }
            }
            xmlhttp.open("GET","getuser.php?q="+str,true);
            xmlhttp.send();
        }

</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<style>


    


</style>
</head>
<body style="background-image: url('img/adminImg.jpg'); ">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      
        <div class="d-grid gap-2 d-md-flex justify-content-md-end ms-auto">


        <!-- ADMIN -->
                <!-- Button trigger modal -->
                <form action="index.php" method="post">
                
                    <button type="submit" class="btn btn-danger" name="logout" data-bs-toggle="modal" data-bs-target="#logout">
                    Logout
                    </button>
                
                </form> 

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

        </div>
      
    </div>
  </div>
</nav>

<div class="mx-auto my-5" style="width: 200px;">
  

        <form class="mx-auto">
                    <select name="users" onchange="showUser(this.value)" class="drop-down mx-auto btn btn-primary dropdown-toggle">
                    <option value="">Select a Client:</option>
                    <?php
                    
                                $sql = "SELECT * FROM client";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value='.($row['clientID']).'>'.$row['fname'].' '. $row['lname'].'</option>';
                                    
                                    
                                }

                                
                                

                                
                            }
                            
                    
                    ?>
                    </select>
                </form>



</div>
        



        <div class="class="mx-auto my-6" style="text-align: center; color:white;" id="txtHint"><b>Client's info will be listed here</b></div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>   

</body>
</html>