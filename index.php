<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Formulario para prueba de seguridad</title>
</head>

<body class="inicio">

  <div class="formularios">

    <div class="login">

      <h1>Iniciar Sesión</h2>

        <form action="login.php" method="POST">

          <?php if (isset($_GET['error'])) { ?>
            <p id="msgerror"><?php echo $_GET['error'] ?></p>
          <?php } ?>

          <div class="campo">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" oninput="soloLetras(event)" required />
          </div>
          <div class="campo">
            <label for="contra">Contraseña:</label>
            <input type="password" id="contra" name="contra" required maxlength="8" size="8" />
          </div>
          <div class="campo">
            <button type="submit" name="login" id="btnIniciar" onclick="IniciarSesion(event)" disabled>Iniciar Sesión</button>
          </div>
        </form>

    </div>

    <div class="signin">

      <h1>Registrarse</h2>

        <form action="registro.php" method="POST">

          <?php if (isset($_GET['errorR'])) { ?>
            <p id="msgerror"><?php echo $_GET['errorR'] ?></p>
          <?php } ?>

          <div class="campo">
            <label for="usuarior">Usuario:</label>
            <input type="text" id="usuarior" name="usuarior" oninput="soloLetras(event)" required />
          </div>
          <div class="campo">
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required />
          </div>
          <div class="campo">
            <label for="contrar">Contraseña:</label>
            <input type="password" id="contrar" name="contrar" required maxlength="8" size="8" />
          </div>
          <div class="campo">
            <button type="submit" name="registro" id="btnRegistrar" onclick="Registrarse(event)" disabled>Registrarse</button>
          </div>
        </form>

    </div>

  </div>

  <script src="js/script.js"></script>

</body>

<footer>

  <div class="FooterDiv">
    <p>Karime Núñez</p>
    <p>204682</p>
  </div>

  <div class="FooterDiv">
    <p>Seguridad de la información</p>
  </div>

  <div class="FooterDiv">
    <p>17 de septiembre del 2023</p>
  </div>

</footer>

</html>