<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
        </form>	
    </div>
</body>
</html>