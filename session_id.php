<?php
   include('connect.php');
   session_start();
   
   $user_check = $_SESSION['clientID'];
   
   $ses_sql = mysqli_query($conn,"select clientID from client where clientID = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $clientID = $row['clientID'];
   
   if(!isset($_SESSION['clientID'])){
      header("location:index.php");
      die();
   }
?>