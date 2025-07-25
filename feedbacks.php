<?php
include 'config/db.php';

// $feedbacks = [
//     [
//         'name' => 'John Doe',
//         'email' => 'john@example.com',
//         'body' => 'Great service!'
//     ],
//     [
//         'name' => 'Jane Smith',
//         'email' => 'jane@example.com',
//         'body' => 'Very satisfied with the product.'
//     ]
// ];

// Fetch Feedbacks from the Database
$sql = "SELECT * FROM feedback";
$result = mysqli_query($connection, $sql);
$feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>


<body class="min-h-screen bg-gray-50">

    <header class="bg-gradient-to-r from-blue-600 to-purple-600 shadow-lg sticky top-0 z-50 h-25">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-25">
                <!-- Logo Section -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md">
                        <i class="fa-regular fa-comments"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white"><a href="home.php">FeedbackHub</a></h1>
                        <p class="text-s text-blue-100 hover:text-gray-100 hidden sm:block"><a href="https://github.com/mohammed-alhanjouri" target="_blank">by Mohammed Al Hanjouri</a></p>
                    </div>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="home.php" class="text-white hover:bg-white hover:text-blue-600 px-4 py-2 rounded-lg text-m font-medium transition duration-200 ease-in-out">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                    <a href="feedbacks.php" class="text-white hover:bg-white hover:text-blue-600 px-4 py-2 rounded-lg text-m font-medium transition duration-200 ease-in-out">
                        <i class="fa-solid fa-comment"></i> Feedbacks
                    </a>
                    <a href="https://www.instagram.com/mohammed.alhanjouri" target="_blank" class="text-white hover:bg-white hover:text-blue-600 px-4 py-2 rounded-lg text-m font-medium transition duration-200 ease-in-out">
                        <i class="fa-solid fa-envelope"></i> Contact
                    </a>
                    <a href="#" class="bg-white text-blue-600 hover:bg-gray-100 px-4 py-2 rounded-lg text-m font-semibold transition duration-200 ease-in-out shadow-md ml-2">
                        Dashboard
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-white text-lg hover:text-gray-300 p-2 rounded-lg transition duration-200">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <div class="flex flex-col space-y-2">
                    <a href="index.php" class="text-black hover:bg-white hover:text-blue-600 px-4 py-2 rounded-lg text-sm font-medium">Home</a>
                    <a href="feedbacks.php" class="text-black hover:bg-white hover:text-blue-600 px-4 py-2 rounded-lg text-sm font-medium transition duration-200">Feedbacks</a>
                    <a href="#" class="text-black hover:bg-white hover:text-blue-600 px-4 py-2 rounded-lg text-sm font-medium transition duration-200">Contact</a>
                    <a href="#" class="bg-white text-blue-600 hover:bg-gray-100 px-4 py-2 rounded-lg text-sm font-semibold">Dashboard</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Add some JavaScript for mobile menu toggle -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    <div class="feedback-container flex items-center justify-center py-12">
        <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-md flex flex-col items-center">
            <h1 class="text-2xl font-bold">Feedbacks</h1>
            <p class="text-gray-600 text-center">Here you can view all the feedbacks submitted by users.</p>

            <?php foreach ($feedbacks as $feedback): ?>
                <div class="card w-full bg-gray-100 p-5 mb-5 rounded-lg shadow">
                    <div class="card-body text-center">
                        <p class="card-text text-lg mb-2">
                            <?php echo $feedback['body']; ?></p>
                        </p>
                        <div class="text-sm text-gray-600">
                            <p>By <?php echo $feedback['name']; ?></p>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
            <a href="home.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-m font-medium hover:bg-blue-700 transition duration-200">Home</a>
        </div>
    </div>

    <footer class = "bg-gradient-to-r from-blue-600 to-purple-600 shadow-lg mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center text-white">
            <p class="text-lg">© 2025 FeedbackHub. All rights reserved.</p>
            <div class="flex justify-center space-x-10 mt-2">
                <a href="https://github.com/mohammed-alhanjouri" target="_blank" class="text-white hover:text-gray-300 text-xl">
                    <i class="fab fa-github"></i>
                </a>
                <a href="https://www.instagram.com/mohammed.alhanjouri" target="_blank" class="text-white hover:text-gray-300 text-xl">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="mailto:mohammadalhanjouri@gmail.com" class="text-white hover:text-gray-300 text-xl">
                    <i class="fa-solid fa-envelope"></i>
                </a>
                <a href="https://www.linkedin.com/in/mohammed-alhanjouri" target="_blank" class="text-white hover:text-gray-300 text-xl">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>