<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recicladora AGS</title>
    <!-- Agregamos nuestro ícono -->
    <link rel = "icon" href = "img/imgLogo.png" type = "image/x-icon">

    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="box">
        <form action="val_login.php" method="POST">
            <span class="text-center">login</span>
            <div class="input-container">
                <input type="text" name="usuario" required=""/>
                <label>ID</label>		
            </div>
            <div class="input-container">		
                <input type="password" name="contraseña" required=""/>
                <label>Contraseña</label>
            </div>
            <button type="submit" class="btn">submit</button>
            <input type="button" value="Regresar" class="btn" onclick="location='index.php'"/>
        </form>
        
    </div>
</body>
</html>