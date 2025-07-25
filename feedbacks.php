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
            <a href="index.php" class="text-blue-600 hover:underline">Home</a>
        </div>
    </div>
</body>
</html>