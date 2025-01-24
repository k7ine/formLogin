<?php
include("conexion.php"); // Make sure this file returns a PDO instance

if (isset($_POST['entra'])) {
    // We collect the data sent from the form
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    try {
        // Query the database to verify the user
        $query = "SELECT password_db FROM usuariocredenciales WHERE usuario_db = :usuario";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR); // Vinculamos el usuario
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $hashed_password = $row['password_db'];

            // Compare the entered password with the stored one
            if (password_verify($password, $hashed_password)) {
                header("Location: ./acceso.php");
                exit();
            } else {
                header("Location: ./error.php");
                exit();
            }
        } else {
            header("Location: ./error.php");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<br><br>
<form action="" method="post">
    <input type="text" name="usuario" placeholder="Introduce el usuario" required>
    <br><br>
    <input type="password" name="password" placeholder="Introduce la contraseña" required>
    <br><br>
    <button type="submit" name="entra">Entrar</button>
    <br><br>
    <a href="./registro.php"><button type="button">¡Regístrate!</button></a>
    <br><br>
    <a href="./administracion_formulario.php"><button type="button">Eres administrador?</button></a>
</form>


