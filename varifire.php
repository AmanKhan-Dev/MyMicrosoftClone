<?php
include('smtp/PHPMailerAutoload.php');

// Verify OTP
if(isset($_POST['verify'])){
    $entered_otp = $_POST['otp'];
    $email = $_POST['email'];

    // Retrieve the OTP from the database for the given email
    $servername = "mysqlprojectdatabase-amankhan7058int-efa9.d.aivencloud.com";
    $username = "avnadmin";
    $password = "AVNS_RY23uWiGqv8kG7CC8Es";
    $dbname = "defaultdb";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT otp FROM details WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($stored_otp);
    $stmt->fetch();
    $stmt->close();

    if($entered_otp == $stored_otp){
        echo "OTP matched. You can now proceed to the next step.";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $entered_otp = $_POST["otp"];
            $name = $_POST["username"];
            $password1 = $_POST["password"];
            $phone = $_POST["phone"];
            $dob = $_POST["dob"];
            $country = $_POST["country"];
            $org = $_POST["org"];
        
            // Connect to the database
            $servername = "sql12.freesqldatabase.com";
    $username = "sql12708516";
    $password = "7YLcfltmdF";
    $dbname = "sql12708516";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            // Retrieve the OTP from the database for the given email
            $stmt = $conn->prepare("SELECT otp FROM details WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($stored_otp);
            $stmt->fetch();
            $stmt->close();
        
            if ($entered_otp == $stored_otp) {
                // Insert data into the database for the corresponding email
                $sql = "UPDATE details SET username='$name', password='$password1', phone='$phone', dob='$dob', country='$country', org='$org' WHERE email='$email'";
        
                if ($conn->query($sql) === TRUE) {
                    // Redirect to a success page
                    header("Location: confirmation.html");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "OTP does not match.";
            }
        
            $conn->close();
        }
        
       
    } else {
        echo "OTP does not match.";
    }
}
?>
