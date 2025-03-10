<?php
  $insert=false;
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "usa";

  $con = mysqli_connect($server, $username, $password, $database);
 
  if (!$con){
    die("Connection to this database failed due to " . mysqli_connect_error());
  }
  // echo "Success connecting to the database";

$name = isset($_POST['name']) ? $_POST['name'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$other = isset($_POST['other']) ? $_POST['other'] : '';


  // Corrected query with a semicolon at the end
  $sql = "INSERT INTO `usa` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
          VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";

//   echo $sql;
  
  if($con->query($sql) ==true){
    //   echo "successfully inserted";
        $insert = true;
  }
  else{
    echo "ERROR: $sql <br> $con->error";
  }
  $con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP first website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="usa.jpg" alt="usa">
    <div class="container">
        <h1>Welcome to USA Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participartion in the trip</p>
        <?php
        if($insert ==true){
         echo "<p class='submitmsg'>Thanks for submitting your form. we are happy to see you joining us for USA trip </p>";}
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="Enter your name">
            <input type="text" name="age" placeholder="Enter your age">
            <input type="text" name="gender" placeholder="Enter your gender">
            <input type="email" name="email" placeholder="Enter your email">
            <input type="text" name="phone" placeholder="Enter your phone">
            <textarea name="other" id="other" placeholder="Enter any other information"></textarea>
            <button type="submit">Submit</button>
        </form>

    </div>

    <script src="script.js"></script>
</body>

</html>