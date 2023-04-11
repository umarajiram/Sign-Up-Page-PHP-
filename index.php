<?php
 session_start();
 $_SESSION["random"] = rand(1,1000);
 $random= $_SESSION["random"];
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
    <?php
      $server = "localhost";
      $username = "root";
      $password = "";
  
      $con = mysqli_connect($server, $username, $password);
  
      if(!$con){
          die("connection to this database failed due to" . mysqli_connect_error());
  
      }
    if(isset($_POST['name'])){
      
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$sql = "INSERT INTO `sample2`.`login` ( `name`, `email`, `phone`, `password`, `random`) VALUES ( '$name', '$email', '$phone', '$password', '$random');";
$result= mysqli_query($con,$sql);

if($result){
    echo "The record has been successfully inserted here <br>";
}
else{
    echo "The record was not inserted properly due to this error --->" . mysqli_error($con);
}

// $sno=$_POST['sno'];
$sql2= "SELECT * FROM `sample2`.`login` WHERE `sample2`.`login`.`random`='$random'";
$result2 = mysqli_query($con,$sql2);


while($row = mysqli_fetch_assoc($result2))
{
    echo "Name: " . $row['name'];
    echo "<br>";
    echo "Email " . $row['email'];
    echo "<br>";
    echo "Phone: " . $row['phone'];
    echo "<br>";
}
// echo "Name: " . $name;
// echo "<br>";
// echo "Email: " . $email;
// echo "<br>";
// echo "Phone: " . $phone;
// echo "<br>";
    }
    
?>
<button type="button"><a href="logout.php" style="text-decoration:none;">Logout</a></button>
</body>
</html>





