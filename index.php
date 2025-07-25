<?php 
include 'config/db.php'; 

$successMessage = '';

// Form Submission Handling

if (isset($_POST['submit'])){
    // Name Validation
    if (empty($_POST['name'])){
        $nameError = "Name is required!";
    } else {
        $name = filter_input(INPUT_POST, 'name' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    // Email Validation
    if (empty($_POST['email'])){
        $emailError = "Email is required!";
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }

    // Body Validation
    if (empty($_POST['body'])){
        $bodyError = "Feedback message is required!";
    } else {
        $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    // Add Feedback to the Database
    if (empty($nameError) && empty($emailError) && empty($bodyError)){
        $sql = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";

        if (mysqli_query($connection, $sql)) {
            $successMessage = "Thank you! Your feedback has been submitted successfully.";
            // header("Location: feedbacks.php"); // Redirect to feedbacks page
        } else {
            $errorMessage = "Error: " . mysqli_error($connection);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
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
                        <h1 class="text-xl font-bold text-white"><a href="index.php">FeedbackHub</a></h1>
                        <p class="text-s text-blue-100 hidden sm:block"><a href="https://github.com/mohammed-alhanjouri" target="_blank">by Mohammed Al Hanjouri</a></p>
                    </div>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="index.php" class="text-white hover:bg-white hover:text-blue-600 px-4 py-2 rounded-lg text-m font-medium transition duration-200 ease-in-out">
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

    <div class="form-container flex items-center justify-center py-12">
        <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-center text-gray-900">Feedback Form</h1>
            <p class="text-gray-600 text-center">We value your feedback! Please fill out the form below.</p>

            <!-- Success Message -->
            <?php if (!empty($successMessage)): ?>
                <div class="flex flex-col items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4" role="alert">
                    <div class="flex items-center">
                        <i class="fa-solid fa-check-circle mr-2"></i>
                        <span><?php echo $successMessage; ?></span>
                    </div>
                    <div class="mt-3">
                        <a href="feedbacks.php" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition duration-200">View Feedbacks</a>
                    </div>
                </div>
                <script>
                    // Auto-redirect after 5 seconds
                    setTimeout(() => {
                        window.location.href = 'index.php';
                    }, 5000);
                </script>
            <?php endif; ?>

            <!-- Error Message -->
            <?php if (!empty($errorMessage)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4" role="alert">
                    <div class="flex items-center">
                        <i class="fa-solid fa-exclamation-circle mr-2"></i>
                        <span><?php echo $errorMessage; ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="space-y-6">
                <div>
                    <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Name:</label>
                    <input type="text" name="name" placeholder="Enter your name.." class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-1 <?php echo isset($nameError) ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-blue-500'; ?>">
                    <p class="text-red-600 text-sm mt-1"><?php echo $nameError; ?></p>
                </div>

                <div>
                    <label for="email" class="block text-lg font-medium text-gray-700 mb-2">Email:</label>
                    <input type="email" name="email" placeholder="Enter your email.." class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-1 <?php echo isset($emailError) ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-blue-500'; ?>">
                    <p class="text-red-600 text-sm mt-1"><?php echo $emailError; ?></p>
                </div>

                <div>
                    <label for="body" class="block text-lg font-medium text-gray-700 mb-2">Feedback Message:</label>
                    <textarea name="body" rows="4" placeholder="Enter your feedback message.." class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-1 <?php echo isset($bodyError) ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-blue-500'; ?>"></textarea>
                    <p class="text-red-600 text-sm mt-1"><?php echo $bodyError; ?></p>
                </div>

                <button type="submit" name="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">Submit</button>
            </form>
        </div>
    </div> 
</body>
</html>