<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookings";
$conn = new mysqli($servername , $username , $password , $dbname);

    if ($conn ->connect_error) {

        die("Connection Failed:" .$conn->connect_error);
}

//Handel Form Submission

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $destination = $_POST["destination"];
        $departure_date = $_POST ["departure-date"]; 
        $return_date = $_POST ["return-date"];


    // prepare and execute  the database insertion 
    
    $sql = "INSERT INTO `booking`(`name`, `email`, `destination`, `departure_date`, `return_date`)
     VALUES ('$name','$email' , '$destination','$departure_date','$return_date')";

     if ($conn->query($sql) == TRUE) {
        echo "Booking Successfully";
     }else {
        echo "Error: " .$sql ."<br>" .$conn->error;
     }

}
$conn->close();
?>