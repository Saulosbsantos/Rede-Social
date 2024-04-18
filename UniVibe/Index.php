<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniVibe - Login</title>

    <!-- CSS -->
    <link rel = "stylesheet" href = "style.css">
    <!-- /CSS -->

    <!-- BOOSTRAP -->
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- /BOOSTRAP -->
    <!-- ICONE -->
    <!-- /ICONE -->
</head>
<body class= "d-flex justify-content-center align-items-center vh-100">
    <!-- CORPO DO SITE -->
    <div class = "brLogin p-5 shadow rounded">
        <form method = "post" action = "app/http/auten.php">
            <div class = "d-flex justify-content aling-items-center flex-column">
                <h3 class = "display-4 fs-1 text-center">LOGIN</h3>
            </div>
                <?php if ( isset ( $_GET['success'] ) ){ ?>

                    <div class = "alert alert-success" role = "alert" >

                        <?php echo htmlspecialchars($_GET['success']);?>"
            </div>
                <?php } ?>
            <div class = "mb-3">
                <label class = "form-label">Nome do Usuario</label>
                <input type="text" class = "form-control">
            </div>
            <div class = "mb-3">
                <label for = "form-label">Senha</label>
                <input type = "password" class = "form-control">
            </div>
            <button type = "submit" class = "btn btn-primary">Continuar</button>
            <a href = "cadastro.php">Cadastra-se</a>
      </form>
    </div>
    <!-- /CORPO DO SITE -->
</body>
</html>