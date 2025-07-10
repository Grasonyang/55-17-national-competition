<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <img src="zip.php?cell_size=<?php if(isset($_GET['cell_size'])) echo $_GET['cell_size']; else echo 50; ?>" alt="Mosaic">
</body>
</html>