<?php
$insert=false;
  if(isset($_POST['name']))
  {

    $server='localhost';
    $username="root";
    $password="";

    $conn= mysqli_connect($server,$username,$password);

    if(!$conn)
    {
        die("Connection to the Database failed due to ".mysqli_connect_error());
    }
    // echo "Successfully connected to Database";

    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];


    $sql="INSERT INTO `mit`.`form` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
         VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // echo $sql;
    
    if($conn->query($sql)==true) //-> object operator
    {
        // echo "Successfully inserted";
        $insert=true;   
    }
    else
    {
        echo "Error: $sql  <br> $conn->error";

    }
    
    $conn->close();
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sahyadri Hostel</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Borel&family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <img src="mitsoe.jpg" alt="IT-building">
    <div class="container">
        <h2>
                Welcome to MIT ADT University
        </h2>
        <p>
            Enter the below details 
        </p>

       <?php
       if($insert==true)
       {
        echo "<p class='enqForm'> Thankyou for filling the form </p>";    
       }
      ?>
       

        <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="number" name="age" id="age" placeholder="Enter your age">
                <input type="text" name="gender" id="gender" placeholder="Enter your gender">
                <input type="email" name="email" id="email" placeholder="Enter your Email">
                <input type="tel" name="phone" id="phone" placeholder="Enter your Phone">
                
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your Enquiry"></textarea>
                <button type="submit" class="btn"> Submit</button>
        </form>

    </div>
    <script src="index.js">

    </script>
    
</body>
</html>
