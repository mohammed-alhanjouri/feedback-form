<?php include 'config/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<header>
    <div class="">
        <h1>Mohammed Al Hanjouri</h1>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="index.php" class="text-blue-600 hover:underline">Home</a></li>
                <li><a href="feedbacks.php" class="text-blue-600 hover:underline">Feedbacks</a></li>
                <li><a href="" class="text-blue-600 hover:underline">Contact</a></li>
            </ul>
        </nav>
    </div>

</header>

<body class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center text-gray-900">Feedback Form</h1>
        <form action="" method="post" class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name:</label>
                <input type="text" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email:</label>
                <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="feedback" class="block text-sm font-medium text-gray-700 mb-2">Feedback Message:</label>
                <textarea name="feedback" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">Submit</button>
        </form>
    </div>    
    
</body>
</html>