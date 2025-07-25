<?php 
include 'config/db.php'; 

// Form Submission Handling

if (isset($_POST['submit'])){
    // Name Validation
    if (empty($_POST['name'])){
        $nameError = "Name is required!";
    } else {
        $name = filter_input(INPUT_POST, 'name' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // echo "Name: " . htmlspecialchars($_POST['name']) . "<br>";
    }

    // Email Validation
    if (empty($_POST['email'])){
        $emailError = "Email is required!";
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        // echo "Email: " . htmlspecialchars($_POST['email']) . "<br>";
    }

    // Body Validation
    if (empty($_POST['body'])){
        $bodyError = "Feedback message is required!";
    } else {
        $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // echo "Feedback Message: " . htmlspecialchars($_POST['body']) . "<br>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>


<body class="min-h-screen bg-gray-50">
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <h1 class="text-xl font-bold text-gray-900">Mohammed Al Hanjouri</h1>
                <nav>
                    <ul class="flex space-x-4">
                        <li><a href="index.php" class="text-blue-600 hover:underline">Home</a></li>
                        <li><a href="feedbacks.php" class="text-blue-600 hover:underline">Feedbacks</a></li>
                        <li><a href="" class="text-blue-600 hover:underline">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="form-container flex items-center justify-center py-12">
        <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-center text-gray-900">Feedback Form</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name:</label>
                    <input type="text" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email:</label>
                    <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Feedback Message:</label>
                    <textarea name="body" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <button type="submit" name="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">Submit</button>
            </form>
        </div>
    </div> 
</body>
</html>