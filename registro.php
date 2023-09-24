<?php
include('conexion.php');

if (isset($_POST['usuarior']) && isset($_POST['correo']) && isset($_POST['contrar'])) {

    function validar($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $usuarioR = validar($_POST["usuarior"]);
    $email = validar($_POST["correo"]);
    $passwordR = validar($_POST["contrar"]);

    $datosUsuario = 'usuarior=' . $usuarioR . '$correo=' . $email;

    if (empty($usuarioR)) {
        header("location: registro.php?errorR?=Nombre de usuario obligatorio");
        exit();
    } elseif (empty($email)) {
        header("location: registro.php?errorR?=Correo electrónico obligatorio");
        exit();
    } elseif (empty($passwordR)) {
        header("location: registro.php?errorR?=Contraseña obligatoria");
        exit();
    } else {
        $hashedPasswordR = password_hash($passwordR, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuarioR'";
        $queryR = $conexion->query($sql);

        if (mysqli_num_rows($queryR) > 0) {
            header("Location: index.php?errorR=El Usuario ya existe");
            exit();
        } else {
            $sql2 = "INSERT INTO usuarios (usuario, email, contraseña) VALUES ('$usuarioR', '$email', '$hashedPasswordR')";
            $query2 = $conexion->query($sql2);
            if ($query2) {
                header("Location: exito.php");
            } else {
                echo "¡No se puede insertar la informacion!"."<br>";
                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                // header("Location: error.html");
            }
        }
    }
}
