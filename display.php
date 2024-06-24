<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .custom-margin-top {
            margin-top: 15%;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg custom-margin-top">
            <div class="p-6 bg-white border-b border-gray-200">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
                    $username1 = $_POST["username"];

                    $servername = "sql12.freesqldatabase.com";
                    $username = "sql12715829";
                    $password = "AbNVgxnj9H";
                    $dbname = "sql12715829";
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT username,email,password,phone,dob,country,org FROM details WHERE username = '$username1'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='bg-gray-200 rounded-lg p-4 mb-4'>";
                            echo "<p class='text-lg font-bold mb-2'>My Account Information</p>";
                            echo "<p><span class='font-bold'>Username:</span> ".$row["username"]."</p>";
                            echo "<p><span class='font-bold'>Email:</span> ".$row["email"]."</p>";
                            echo "<p><span class='font-bold'>Password:</span> ".$row["password"]."</p>";
                            echo "<p><span class='font-bold'>Phone:</span> ".$row["phone"]."</p>";
                            echo "<p><span class='font-bold'>Date of Birth:</span> ".$row["dob"]."</p>";
                            echo "<p><span class='font-bold'>Country:</span> ".$row["country"]."</p>";
                            echo "<p><span class='font-bold'>Organization:</span> ".$row["org"]."</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "No records found for username: " . $username;
                    }

                    $conn->close();
                } else {
                    echo "No username provided.";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
