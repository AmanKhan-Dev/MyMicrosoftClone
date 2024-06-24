!-- <?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are set and not empty
    if (isset($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        // Check if email and password match in the database (replace database connection details)
        $con = new mysqli("sql12.freesqldatabase.com", "sql12715829", "AbNVgxnj9H", "sql12715829");

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT username FROM details WHERE email = '$email' AND password = '$password'";
        $result = $con->query($query);

        if ($result->num_rows == 1) {
            // User is authenticated, redirect to another page
            $row = $result->fetch_assoc();
            $username = $row["username"];
            $_SESSION['username'] = $username; // Set the session variable

            header("Location: index.html");
            exit();
        } else {
            // Authentication failed, display error message
           echo "Invalid email or password. Please try again.";
        }
    } else {
        // Email or password not provided, display error message
       echo "Please enter both email and password.";
    }
}

?> 