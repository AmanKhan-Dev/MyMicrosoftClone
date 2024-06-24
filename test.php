<?php
include('smtp/PHPMailerAutoload.php');

// Database connection details
$servername = "sql12.freesqldatabase.com";
$username = "sql12715829";
$password = "AbNVgxnj9H";
$dbname = "sql12715829";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $otp = mt_rand(100000, 999999);
    $message = 'Hello,

    Thank you for signing up for a Microsoft account. Your OTP for account verification is: ' . $otp;

    $result = smtp_mailer($conn, $email, $otp, 'OTP Verification', $message);

    if ($result === 'Sent') {
        echo "OTP sent successfully!";
        
    } else {
        echo "Error sending OTP: " . $result;
        exit();
    }
}

function smtp_mailer($conn, $to, $otp, $subject, $msg) {
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    // $mail->SMTPDebug = 2; 
    $mail->Username = "amankhan7058int@gmail.com";
    $mail->Password = "gfbk efuf rwbu rhze";
    $mail->SetFrom("amankhan7058int@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ));

    // Save OTP in database
    $stmt = $conn->prepare("INSERT INTO details (email, otp) VALUES (?,?)");
    $stmt->bind_param("si", $to, $otp);
    $stmt->execute();
    $stmt->close();

    if (!$mail->Send()) {
        return $mail->ErrorInfo;
    } else {
        return 'Sent';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign-Up Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="assets/icons/microsoft-logo.svg">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body class="bg-cover h-screen bg-center bg-no-repeat overflow-hidden" style="background-image: url(https://www.designbolts.com/wp-content/uploads/2014/03/Light-Blue-blur-background1.jpg);">
    <div class="bg-blue-100 w-[35%] h-[60%] justify-center items-center p-10 mx-auto mt-[12%] drop-shadow-2xl">
        <img class="w-[37%]" src="https://www.freepnglogos.com/uploads/microsoft-logo-4.png" alt="img">
        <h1 id="sig" class="ml-5 font-semibold text-2xl">Create New Account</h1>
        <br>
        <form method="post" action="varifire.php">
            <div>
                <input type="text" id="username" name="username" placeholder="Enter Your Name" class="border-b w-[90%] ml-[4%] border-gray-500 focus:outline-none focus:border-indigo-500 bg-transparent mt[2%]">
            </div>
            <div>
                <input type="text" id="otp" name="otp" required placeholder="Enter The OTP" class="border-b w-[90%] ml-[4%] border-gray-500 focus:outline-none focus:border-indigo-500 bg-transparent mt-[2%]">
                <input type="hidden" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                <input type="hidden" name="expected_otp" value="<?php echo isset($otp) ? $otp : ''; ?>">
            </div>
            <div>
                <input type="text" id="password" name="password" placeholder="Create Password" class="border-b w-[90%] ml-[4%] border-gray-500 focus:outline-none focus:border-indigo-500 bg-transparent mt-[2%]">
            </div>
            <div>
                <input type="tel" id="phone" name="phone" placeholder="Enter Your Phone Number" class="border-b w-[90%] ml-[4%] border-gray-500 focus:outline-none focus:border-indigo-500 bg-transparent mt-[2%]">
            </div>
            <div>
                <input type="date" id="dob" name="dob" placeholder="Date Of Birth" class="border-b w-[90%] ml-[4%] border-gray-500 focus:outline-none focus:border-indigo-500 bg-transparent mt-[2%]">
            </div>
            <div>
                <input type="text" id="country" name="country" placeholder="Enter Your Country" class="border-b w-[90%] ml-[4%] border-gray-500 focus:outline-none focus:border-indigo-500 bg-transparent mt-[2%]">
                <input type="text" id="org" name="org" placeholder="Enter Your Organization Or University Name" class="border-b w-[90%] ml-[4%] border-gray-500 focus:outline-none focus:border-indigo-500 bg-transparent mt-[2%]">
            </div>
            <div>
                <button class="bg-blue-600 w-[20%] h-[10%] text-white rounded-sm mt-[10%] ml-[72%] transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-500 duration-100" type="submit" name="verify">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>