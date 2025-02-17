<?php
session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['entrar'])) {

    include("conectar.php");

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $senha = $_POST['password'];

    $query = "SELECT * FROM utilizadores WHERE Email = ?";
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($senha, $user['password_u'])) {
                $_SESSION['Email'] = $email; 

                header("Location: pagina.php");
                exit(); 
            } else {
                echo "Erro: Senha incorreta.";
            }
        } else {
            echo "Erro: Email não encontrado.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro ao preparar a consulta.";
    }
}
?>
