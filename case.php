
<?php
    require_once('connect.php');
    session_start();
    if(isset($_POST['viewInvoice'])){


    $casename = $_POST['casename'];
    $_SESSION['casename'] = $casename;
    $courtname = $_POST['courtname'];
    $_SESSION['courtname'] = $courtname;
    $casetype = $_POST['casetype'];
    $_SESSION['casetype'] = $casetype;
    $price = $_POST['price'];
    $_SESSION['price'] = $price;
    $caseyear = $_POST['caseyear'];
    $year = explode("-",$caseyear);
    $_SESSION['year'] = $year[0];
    $caseinfo = $_POST['caseinfo'];
    $_SESSION['caseinfo'] = $caseinfo;
    $date = date("Y-m-d");
    $_SESSION['date'] = $date;
    $caseID = $_SESSION['caseID'];

    

    $sql = "UPDATE `cases` SET `casename`='$casename',`caseyear`='$year[0]',`courtname`='$courtname',`caseinfo`='$caseinfo',`type`='$casetype',`price`='$price',`date`= '$date' WHERE `caseID`='$caseID' ";

    

    $result = mysqli_query($conn, $sql);


    header("refresh: 0; url=makepdf.php");



    }

    if(isset($_POST['sendInvoice'])){


        $casename = $_POST['casename'];
        $_SESSION['casename'] = $casename;
        $courtname = $_POST['courtname'];
        $_SESSION['courtname'] = $courtname;
        $casetype = $_POST['casetype'];
        $_SESSION['casetype'] = $casetype;
        $price = $_POST['price'];
        $_SESSION['price'] = $price;
        $caseyear = $_POST['caseyear'];
        $year = explode("-",$caseyear);
        $_SESSION['year'] = $year[0];
        $caseinfo = $_POST['caseinfo'];
        $_SESSION['caseinfo'] = $caseinfo;
        $date = date("Y-m-d");
        $_SESSION['date'] = $date;
        $caseID = $_SESSION['caseID'];
    
        
    
        $sql = "UPDATE `cases` SET `casename`='$casename',`caseyear`='$year[0]',`courtname`='$courtname',`caseinfo`='$caseinfo',`type`='$casetype',`price`='$price',`date`= '$date' WHERE `caseID`='$caseID' ";
    
        
    
        $result = mysqli_query($conn, $sql);
    
    
        header("refresh: 0; url=invoice.php");
    
    
    
        }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case <?php echo $_SESSION['caseID'];?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body style="background-image: url('img/adminImg.jpg'); ">
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Case - <?php echo $_SESSION['caseID'];?></a>
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
                

                

        </div>
      
    </div>
  </div>
</nav>

<div class="container mt-5 w-50 p-3">


    <form action="case.php" method="post">


    <div class="row ">
        <div class="col">
            <input type="text" name="casename" class="form-control" placeholder="Case Name" aria-label="First name" required>
        </div>
        <div class="col">
            <input type="text" name="courtname" class="form-control" placeholder="Court Name" aria-label="Last name" required>
        </div>
    </div>
    <div class="row mt-5 ">
        <div class="col ">
        <select name="casetype" class="btn btn-primary dropdown-toggle px-5" id="casetype" required>
            <option value="REAL ESTATE" selected>REAL ESTATE</option>
            <option value="CRIMINAL LAW">CRIMINAL LAW</option>
            <option value="CORPORATE LAW">CORPORATE LAW</option>
        </select>
        </div>
        <div class="col ">
            <input type="text" name="price" class="form-control form-floating" id="price" placeholder="Price" aria-label="Last name" required>
        </div>
        <div class="col">
            <!-- <label for="caseyear">Case Year</label> -->
            <input type="month" name="caseyear" class="form-control form-floating" id="caseyear" placeholder="Court Year" aria-label="Last name" required>
        </div>
        
    </div>
    <div class="form-floating mt-5">
        <textarea class="form-control" name="caseinfo" placeholder="Enter Case Information..." id="floatingTextarea" required style="height: 200px"></textarea>
        <label for="floatingTextarea">Case Information</label>
    </div>
    
    
    <div class="mx-auto my-5" style="width: 200px;">

    <div class="row ">
        <div class="col">
            <button type="submit" name="viewInvoice" class="btn btn-primary  ">View Invoice</button>
        </div>
        <div class="col">
            <button type="submit" name="sendInvoice" class="btn btn-primary">Send Invoice</button>
        </div>
    </div>
    

    </div>
    




    </form>


</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> 
</body>
</html>