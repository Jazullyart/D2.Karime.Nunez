<?php

 session_start();

$intentosPermitidos = 3;
$tiempoBloqueo = 10;

if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 0;
}

include('conexion.php');
if (isset($_POST['usuario']) && isset($_POST['contra'])) {

    function validar($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    $usuarioL = validar($_POST['usuario']);
    $contraL = validar($_POST['contra']);

    $hashedPassword = password_hash($contraL, PASSWORD_DEFAULT);

    if (empty($usuarioL)) {
        header('location: index.php?error=Ingrese nombre de usuario');
        exit();
    } elseif (empty($contraL)) {
        header('location: index.php?error=Ingrese contraseña');
        exit();
    } else {

        if (isset($_SESSION['bloqueo']) && time() - $_SESSION['bloqueo'] < $tiempoBloqueo) {
            $tiempoRestante = $tiempoBloqueo - (time() - $_SESSION['bloqueo']);
            header('Location: error.php?errorI=Has excedido el número máximo de intentos. Inténtalo nuevamente en ' . $tiempoRestante . ' segundos.');
            exit();
        }

        $Sql = "SELECT * FROM usuarios WHERE usuario = '$usuarioL'";
        $query = mysqli_query($conexion, $Sql);

        if ($query->num_rows == 1) {
            $usuarioQ = $query->fetch_assoc();

            $idUsuario = $usuarioQ['idUsuario'];
            $nomUsuario = $usuarioQ['usuario'];
            $emailUs = $usuarioQ['email'];
            $contraV = $usuarioQ['contraseña'];

            if ($usuarioL === $nomUsuario) {
                if (password_verify($contraL, $contraV)) {
                    $_SESSION['idUsuario'] = $idUsuario;
                    $_SESSION['usuario'] = $nomUsuario;
                    $_SESSION['email'] = $emailUs;
                    $_SESSION['contraseña'] = $contraV;

                    unset($_SESSION['intentos']);
                    // unset($_SESSION['bloqueo']);

                    header("Location: exito.php");
                }else {
                    if (isset($_SESSION['intentos'])) {
                        $_SESSION['intentos']++;
                    } else {
                        $_SESSION['intentos'] = 1;
                    }
                // echo "Error: " . $Sql . "<br>" . mysqli_error($conexion);
                    header('Location: index.php?error=Usuario o contraseña incorrectos.');
                }
            } else {
                if (isset($_SESSION['intentos'])) {
                    $_SESSION['intentos']++;
                } else {
                    $_SESSION['intentos'] = 1;
                }

                if ($_SESSION['intentos'] >= $intentosPermitidos) {
                    $_SESSION['bloqueo'] = time();
                    header('Location: error.php?errorI=Has excedido el número máximo de intentos. Inténtalo nuevamente en ' . $tiempoBloqueo . ' segundos.');
                    exit();
                }

                // echo "Error: " . $Sql . "<br>" . mysqli_error($conexion);
                header('Location: index.php?error=Usuario o contraseña incorrectos.');
            }
        } else {
            if (isset($_SESSION['intentos'])) {
                $_SESSION['intentos']++;
            } else {
                $_SESSION['intentos'] = 1;
            }

            if ($_SESSION['intentos'] >= $intentosPermitidos) {
                $_SESSION['bloqueo'] = time();
                header('Location: error.php?errorI=Has excedido el número máximo de intentos. Inténtalo nuevamente en ' . $tiempoBloqueo . ' segundos.');
                exit();
            }

            // echo "Error: " . $Sql . "<br>" . mysqli_error($conexion);
            header('Location: index.php?error=Usuario o contraseña incorrectos.');
        }
    }
} 