<?php

$feedbacks = [
    [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'feedback' => 'Great service!'
    ],
    [
        'name' => 'Jane Smith',
        'email' => 'jane@example.com',
        'feedback' => 'Very satisfied with the product.'
    ]
];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-md flex flex-col items-center">
        <h1 class="text-2xl font-bold">Feedbacks</h1>
        <p class="text-gray-600">Here you can view all the feedbacks submitted by users.</p>

        <?php foreach ($feedbacks as $feedback): ?>
            <div class="card w-full bg-gray-100 p-5 mb-5 rounded-lg shadow">
                <div class="card-body text-center">
                    <p class="card-text text-lg mb-2">
                        <?php echo $feedback['feedback']; ?></p>
                    </p>
                    <div class="text-sm text-gray-600">
                        <p>By <?php echo $feedback['name']; ?></p>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
        <a href="index.php" class="text-blue-600 hover:underline">Home</a>
    </div>
</body>
</html>