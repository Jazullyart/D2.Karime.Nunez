<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Error</title>
  </head>
  <body>
    <div class="msg">
      <div class="Titulo">
        <h1>Ups...</h1>
      </div>
      <hr />
      <div class="Cont">
        <p>Ha habido un error al intentar iniciar sesión/registrarse.</p>

        <?php if (isset($_GET['errorI'])) { ?>
            <p style="font-weight: bold;"><?php echo $_GET['errorI'] ?></p>
          <?php } ?>

        <img src="img/icons8-error-512.png">
          <br>
        <a href="index.php"><button>Regresar</button></a>
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
