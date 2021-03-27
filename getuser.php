<!DOCTYPE html>
<html>
<head>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<style>


    

</style>
</head>
<body>

    <?php
    require_once('connect.php');
    session_start();
    $q = intval($_GET['q']);
    $sql="SELECT * FROM client WHERE clientID = '".$q."'";
    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result);
    $_SESSION['clientID'] = $row['clientID'];
    
    $name = $row['fname'];
    $name.=" ";
    $name.=$row['lname']; 
    $_SESSION['name'] = $name;

    
    
    ?>

<div class="table-responsive-sm mx-5 my-5 panel panel-default">

    
    <table class="table table-dark table-striped align-middle table-bordered">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Number</th>
        <th scope="col">type</th>

        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row"><?php echo $row['clientID'];?></th>
        <td><?php echo $name?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['address'];?></td>
        <td><?php echo $row['number'];?></td>
        <td><?php echo $row['type'];?></td>
        </tr>
        
    </tbody>
    </table>



</div>

<div class="mx-auto my-5" style="width: 200px;"> 


    <form action="admin.php" method="post" >


    <button type="submit" name="submit" class="btn btn-dark px-5">Write Case</button>


    </form>


</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>   

</body>

</html>