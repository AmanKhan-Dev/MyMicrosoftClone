<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Microsoft - Official Home Page</title>
    <!-- Page Icon -->
    <link rel="icon" href="assets/icons/microsoft-logo.svg">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
        <script src="https://cdn.tailwindcss.com"></script>
      
</head>

<body>
    <!-- NavBar -->
    <header class="navbar bg-gray-900 text-white">
        <div class="container mx-auto flex justify-between items-center py-4">
            <!-- Left Nav -->
            <nav class="flex">
                <a href="#"><img src="assets/icons/microsoft-logo1.svg" alt="Microsoft Logo"
                        class="w-20 h-10"></a>
                <ul class="flex space-x-6 ml-8">
                    <!-- Logo -->
                    <li><a href="#" class="hover:text-gray-300 ">Microsoft 365</a></li>
                    <li><a href="#" class="hover:text-gray-300">Office</a></li>
                    <li><a href="#" class="hover:text-gray-300">Windows</a></li>
                    <li><a href="#" class="hover:text-gray-300">Surface</a></li>
                    <li><a href="#" class="hover:text-gray-300">Xbox</a></li>
                    <li><a href="#" class="hover:text-gray-300">Support</a></li>
                </ul>   
            </nav>

           <!-- IMPLEMENTING AJAX -->
           <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
           <script>
           $(document).ready(function(){
           $('.search-box input[type="text"]').on("keyup input", function(){
           /* Get input value on change */
           var inputVal = $(this).val();
           var resultDropdown = $(this).siblings(".result");
           if(inputVal.length){
           $.get("backend-search.php", {term: inputVal}).done(function(data){
           // Display the returned data in browser
           resultDropdown.html(data);
           });
           } else{
           resultDropdown.empty();
           }
           });
           // Set search input value on click of result item
           $(document).on("click", ".result p", function(){
           $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
           $(this).parent(".result").empty();
           
           });
           });
           </script>

            <!-- Right Nav -->
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#" class="hover:text-gray-300">All Microsoft <i class="fas fa-chevron-down"></i></a>
                    </li>
                    <!-- <li><a href="#" class="hover:text-gray-300">Search <i class="fas fa-search"></i></a></li> -->
                
                        <!-- <input class="border-gray-300  focus:ring text-black focus:ring-blue-200 focus:border-blue-300 rounded-md shadow-sm p-1 text-sm" type="search" placeholder="Search" aria-label="Search"> -->
                        <div class="search-box">
                            <input type="text"  placeholder="Search " class="border-gray-300 l  focus:ring text-black focus:ring-blue-200 focus:border-blue-300 rounded-md shadow-sm p-1 w-[300px]" />
                            <div class="result"></div>
                            </div>
            
                    <li><a href="#" class="hover:text-gray-300">Cart <i class="fas fa-shopping-cart"></i></a></li>
                    <?php

$servername = "sql12.freesqldatabase.com";
$username = "sql12708516";
$password = "7YLcfltmdF";
$dbname = "sql12708516";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get email and password from form
$email = $_POST['email'];
$password1 = $_POST['password'];

// Prepare SQL query
$sql = "SELECT username FROM details WHERE email = '$email' AND password = '$password1'";

// Execute query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<form action="display.php" method="post">';
        echo '<input type="hidden" name="username" value="' . $row["username"] . '">';
        echo '<button type="submit"><i class="far fa-user-circle"></i>' . $row["username"] . '</button>';
        echo '</form>';
    }
} else {
    echo "<p>No username found for this email and password combination.</p>";
    header("Location: login.html");
    exit(); // Stop further execution
}

// Close connection
$conn->close();
?>

                 
                </ul>
               
                
                
            </nav>
        </div>
        
    </header>

    <!-- Hero -->
    <section class="hero bg-gray-100">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <!-- Left -->
                <div class="max-w-md">
                    <h2 class="text-3xl font-semibold">Microsoft 365</h2>
                    <p class="mt-4">Premium Office apps, extra cloud storage, advanced security, and more - all in one
                        convenient subscription</p>
                    <div class="flex mt-4">
                        <a href="demo.html" class="bg-black text-white px-4 py-2 rounded-md flex items-center mr-4">
                            <span class="mr-2">Explore Microsoft 365</span> <i class="fas fa-chevron-right"></i>
                        </a>
                       
                    </div>
                </div>
                <!-- Right -->
                <div class="max-w-lg">
                    <img src="assets/images/products-img.png" alt="Hero Products Image" class="w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Products -->
    <section class="products bg-gray-900 text-white">
        <div class="container mx-auto flex justify-center items-center">
            <a href="#" class="card products-card">
                <img src="assets/icons/logo.png" alt="Microsoft Black Logo" class="w-20 h-20">
                <h4 class="mb-16">Choose your Microsoft 365,</h4>
            </a>
            <a href="#" class="card products-card">
                <img src="assets/icons/surface-laptop.webp" alt="Microsoft Black Logo" class="w-20 h-20">
                <h4 class="mb-16">Explore Surface devices,</h4>
            </a>
            <a href="#" class="card products-card">
                <img src="assets/icons/xbox-icon.png" alt="Microsoft Black Logo" class="w-20 h-20">
                <h4 class="mb-16">Buy Xbox games,</h4>
            </a>
            <a href="#" class="card products-card">
                <img src="assets/icons/windows-10-icon.png" alt="Microsoft Black Logo" class="w-20 h-20">
                <h4 class="mb-16">Shop for Windows 10</h4>
            </a>
        </div>
    </section>


    <!-- About Products -->
    <section class="about-products bg-gray-100">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="card about-products-card transform transition-all hover:scale-110 hover:drop-shadow-2xl ">
            
                <img src="assets/images/surface-img.jfif" alt="" class="w-full">
                <h3 class="mt-4 text-xl font-semibold">Surface Laptop 5</h3>
                <p class="mt-2">Express yourself powerfully with a thin, light, and elegant design, faster performance, and up to 11.5 hours battery life.</p>
                <a href="syrface5.html">Shop now <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="card about-products-card transform transition-all hover:scale-110 hover:drop-shadow-2xl ">
                <img src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Surface-Laptop-Studio-01-CP?wid=380&hei=213&fit=crop" alt="" class="w-full">
                <h3 class="mt-4 text-xl font-semibold">Surface Laptop Studio</h3>
                <p class="mt-2">Flex your creative muscle on the most powerful Surface Laptop. Now available with Windows 11.</p>
                <a href="studio.html" class="blue-btn mt-4">Shop now <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="card about-products-card transform transition-all hover:scale-110 hover:drop-shadow-2xl">
                <img src="assets/images/xbox-pass.jfif" alt="" class="w-full">
                <h3 class="mt-4 text-xl font-semibold">Xbox Games Pass Ultimate</h3>
                <p class="mt-2">Xbox Live Gold and over 100 high-quality console and PC games. Play together with friends and discover your next favorite game.</p>
                <a href="xbox.html" class="blue-btn mt-4">Join now <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="card about-products-card transform transition-all hover:scale-110 hover:drop-shadow-2xl">
                <img src="assets/images/microsoft-edge-img.webp" alt="" class="w-full">
                <h3 class="mt-4 text-xl font-semibold">Microsoft Edge</h3>
                <p class="mt-2">World-class performance with more privacy, productivity, and value while you browse.</p>
                <a href="edge.html" class="blue-btn mt-4">Download now <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </section>
    

    <!-- Hero 2 -->
    <section class="hero-2 bg-gray-100">
        <div class="container mx-auto">
            <div class="flex justify-center items-center h-96 bg-cover bg-center bg-no-repeat"
                style="background-image: url('assets/images/onedrive-img.jpg');">
                <div class="text-center">
                    <h3 class="text-3xl font-semibold">Microsoft OneDrive</h3>
                    <p class="mt-4">Save your files and photos to OneDrive and access them from any device, anywhere.</p>
                    <div class="mt-4">
                        <a href="#" class="bg-black text-white px-4 py-2 rounded-md flex items-center">
                            <span class="mr-2">Learn More</span> <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Products 2 -->
    <section class="about-products-2 bg-gray-100">
        <div class="container mx-auto">
            <h3 class="text-center text-3xl font-semibold my-8">For Business</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card about-products-card">
                    <img src="assets/images/laptop-img4.webp" alt="" class="w-full">
                    <h3 class="mt-4 text-xl font-semibold">Surface for Business</h3>
                    <p class="mt-2">No matter what you do, there's a Surface to help you do it.</p>
                    <a href="#" class="blue-btn mt-4">Shop now <i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="card about-products-card">
                    <img src="assets/images/pc-img.webp" alt="" class="w-full">
                    <h3 class="mt-4 text-xl font-semibold">Microsoft 365 for Business</h3>
                    <p class="mt-2">Stay a step ahead with powerful apps for productivity, connection, and security.</p>
                    <a href="#" class="blue-btn mt-4">Shop now <i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="card about-products-card">
                    <img src="assets/images/people-img.webp" alt="" class="w-full">
                    <h3 class="mt-4 text-xl font-semibold">Resilience at Work</h3>
                    <p class="mt-2">Keep your team connected, wherever they are, with Microsoft Teams.</p>
                    <a href="#" class="blue-btn mt-4">Shop now <i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="card about-products-card">
                    <img src="assets/images/microsoft-team-img.webp" alt="" class="w-full">
                    <h3 class="mt-4 text-xl font-semibold">Microsoft Teams</h3>
                    <p class="mt-2">Chat, meet, call, and collaborate.</p>
                    <a href="#" class="blue-btn mt-4">Shop now <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Section -->
    <section class="response bg-gray-900 text-white">
        <div class="container mx-auto">
            <div class="text-center py-12">
                <h3 class="text-3xl font-semibold">Grow Your Business With Microsoft</h3>
                <p class="mt-4">Read how we can help you to grow your business,and get resource to help</p>
                <a href="#" class="border border-white px-4 py-2 rounded-md mt-4 inline-block">Learn More <i
                        class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Socialize Section -->
    <section class="socialize bg-gray-100">
        <div class="container mx-auto flex justify-center items-center py-4">
            <p class="mr-4">Follow Microsoft</p>
            <!-- Social icons -->
            <ul class="flex">
                <li><a href="#"><img src="assets/icons/facebook.svg" alt="Facebook icon"
                            class="w-6 h-6"></a></li>
                <li><a href="#"><img src="assets/icons/twitter.svg" alt="Twitter icon"
                            class="w-6 h-6"></a></li>
                <li><a href="#"><img src="assets/icons/youtube.svg" alt="YouTube icon"
                            class="w-6 h-6"></a></li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <footer class="customer-footer bg-gray-900 text-white">
        <div class="container mx-auto">
            <!-- Upper Footer -->
            <div class="upper-footer grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-8 py-8">
                <nav>
                    <h3 class="text-xl font-semibold">What's new</h3>
                    <ul class="mt-4">
                        <li><a href="#" class="hover:text-gray-300">Microsoft 365</a></li>
                        <li><a href="#" class="hover:text-gray-300">Surface Pro X</a></li>
                        <li><a href="#" class="hover:text-gray-300">Surface Pro 7</a></li>
                        <li><a href="#" class="hover:text-gray-300">Surface Laptop 3</a></li>
                        <li><a href="#" class="hover:text-gray-300">Windows 10 apps</a></li>
                    </ul>
                </nav>

                <!-- Other Navs -->
                <nav>
                    <h3 class="text-xl font-semibold">Microsoft Store</h3>
                    <ul class="mt-4">
                        <li><a href="#" class="hover:text-gray-300">Account profile</a></li>
                        <li><a href="#" class="hover:text-gray-300">Download Center</a></li>
                        <li><a href="#" class="hover:text-gray-300">Microsoft Store Support</a></li>
                        <li><a href="#" class="hover:text-gray-300">Returns</a></li>
                        <li><a href="#" class="hover:text-gray-300">Order tracking</a></li>
                    </ul>
                </nav>

                <!-- Education Navs -->
                <nav>
                    <h3 class="text-xl font-semibold">Education</h3>
                    <ul class="mt-4">
                        <li><a href="#" class="hover:text-gray-300 ">Microsoft in education</a></li>
                        <li><a href="#" class="hover:text-gray-300">Office in students</a></li>
                        <li><a href="#" class="hover:text-gray-300">Office 365 for schools</a></li>
                        <li><a href="#" class="hover:text-gray-300">Microsoft Azure in education</a></li>
                    </ul>
                </nav>

                <!-- Enterprise Navs -->
                <nav>
                    <h3 class="text-xl font-semibold">Enterprise</h3>
                    <ul class="mt-4">
                        <li><a href="#" class="hover:text-gray-300">Azure</a></li>
                        <li><a href="#" class="hover:text-gray-300">AppSource</a></li>
                        <li><a href="#" class="hover:text-gray-300">Automotive</a></li>
                        <li><a href="#" class="hover:text-gray-300">Government</a></li>
                        <li><a href="#" class="hover:text-gray-300">HealthCare</a></li>
                        <li><a href="#" class="hover:text-gray-300">Manufacturing</a></li>
                        <li><a href="#" class="hover:text-gray-300">Financial Services</a></li>
                        <li><a href="#" class="hover:text-gray-300">Retail</a></li>
                    </ul>
                </nav>

                <!-- Developer Navs -->
                <nav>
                    <h3 class="text-xl font-semibold">Developer</h3>
                    <ul class="mt-4">
                        <li><a href="#" class="hover:text-gray-300">Microsoft Visual Studio</a></li>
                        <li><a href="#" class="hover:text-gray-300">Developer Center</a></li>
                        <li><a href="#" class="hover:text-gray-300">Channel 9</a></li>
                        <li><a href="#" class="hover:text-gray-300">Office Dev Center</a></li>
                    </ul>
                </nav>

                <!-- Company Navs -->
                <nav>
                    <h3 class="text-xl font-semibold">Company</h3>
                    <ul class="mt-4">
                        <li><a href="#" class="hover:text-gray-300">Careers</a></li>
                        <li><a href="#" class="hover:text-gray-300">About Microsoft</a></li>
                        <li><a href="#" class="hover:text-gray-300">Company News</a></li>
                        <li><a href="#" class="hover:text-gray-300">Privacy at Microsoft</a></li>
                        <li><a href="#" class="hover:text-gray-300">Investors</a></li>
                        <li><a href="#" class="hover:text-gray-300">Security</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Lower Footer -->
            <div class="lower-footer flex justify-between items-center py-4">
                <!-- Left Side -->
                <div class="flex items-center">
                    <i class="fas fa-globe-asia text-xl"></i>
                    <p class="ml-2">English (India)</p>
                </div>
                <!-- Right Side -->
                <nav>
                    <ul class="flex space-x-4">
                        <li><a href="#" class="hover:text-gray-300">Contact Microsoft</a></li>
                        <li><a href="#" class="hover:text-gray-300">Privacy</a></li>
                        <li><a href="#" class="hover:text-gray-300">Terms of use</a></li>
                        <li><a href="#" class="hover:text-gray-300">Trade marks</a></li>
                        <li><a href="#" class="hover:text-gray-300">About our ads</a></li>
                        <li><a href="#" class="hover:text-gray-300">© Microsoft 2024</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>

    <!-- JS Scripts -->
    <script src="assets/js/app.js"></script>

</body>

</html>
