<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <div style="text-align:center; padding:15%;">
      <p style="font-size:50px; font-weight:bold;">
       Hello 
       <?php 
       if(isset($_SESSION['email'])) {
           $email = $_SESSION['email'];
           $query = mysqli_query($conn, "SELECT firstName, lastName FROM `users` WHERE email='$email'");
           
           if($query && mysqli_num_rows($query) > 0) {
               $row = mysqli_fetch_assoc($query);
               if(isset($row['firstName']) && isset($row['lastName'])) {
                   echo htmlspecialchars($row['firstName']).' '.htmlspecialchars($row['lastName']);
               } else {
                   echo "User";
               }
           } else {
               echo "User";
           }
       } else {
           echo "Guest";
       }
       ?>
       :)
      </p>
      <a href="logout.php">Logout</a>
    </div>
</body>
</html>