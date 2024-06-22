<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["username"];
 //   $email = $_POST["email"];
    $password1 = $_POST["password"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $country = $_POST["country"];
    $org = $_POST["org"];

    // Connect to the database
    
    $servername = "mysqlprojectdatabase-amankhan7058int-efa9.d.aivencloud.com";
$username = "avnadmin";
$password = "AVNS_RY23uWiGqv8kG7CC8Es";
$dbname = "defaultdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query
    $sql = "INSERT INTO details (username, password, phone, dob, country, org) 
            VALUES ('$name', '$password1', '$phone', '$dob', '$country', '$org')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to login page after successful insertion
        header("Location: login.html");
        exit(); // Stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
