<?php

    session_start();

    if ( isset ( $_SESSION['usuario']) ){
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniVibe - Home</title>
    
    <!-- BOOSTRAP -->
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- /BOOSTRAP -->
    <!-- CSS -->
    <link rel = "stylesheet" href = "style.css">
    <!-- /CSS -->
</head>
<body class = "d-flex justify-content-center aling-items-center vh-100" >

        <div class = "p-2 brLogin rounded shadow"></div>
</body>
</html>

<?php
    }else{

        header("Location: ../../index.php");
        exit;
    } 
?>
