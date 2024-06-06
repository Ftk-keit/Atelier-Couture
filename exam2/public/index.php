<?php 
    define("WEBROOT", "http://localhost:8080")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="flex items-center justify-center flex-col h-[100vh] m-0">
        <?php 
            require_once("../controllers/article.controller.php");
        ?>
    </div>
    <script src="/js/script.js"></script>
</body>
</html>