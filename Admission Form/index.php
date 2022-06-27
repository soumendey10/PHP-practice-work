<?php
$insert = false;
if(isset($_POST['name'])){
    //Set connection variables
$SERVER = "localhost";
$username = "root";
$password = "";
//Create database Connection
$con = mysqli_connect($SERVER, $username, $password);
//Check for Connection success
if(!$con){
    die("Connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success connecting to the db";

//Collect Post variables

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email= $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql = "INSERT INTO `trip`.`trip`(`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

// Execute the Query
if($con->query($sql) == true){
    // echo "Successfully inserted";

    //Flag for Succesful insertion
    $insert = true;
}else{
    echo "ERROR: $sql <br> $con->error";
}
//Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="bg.jpg" alt="IIT Kharagpur" class="bg">
    <div class="container">
        <h1>Welcome to IIT Kharagpur Us Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'> Thanks for submitting your form. we are happy to see you joining us for the US Trip</p>";
        }
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder= "Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>