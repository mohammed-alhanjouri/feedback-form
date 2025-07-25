<?php 
include 'config/db.php'; 

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
            echo "Feedback submitted successfully!";
            // Redirect to Feedbacks Page
            header("Location: feedbacks.php");
        } else {
            echo "Error: " . mysqli_error($connection);
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
            <p class="text-gray-600 text-center">We value your feedback! Please fill out the form below.</p>
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