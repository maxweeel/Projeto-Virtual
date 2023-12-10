<?php
session_start();

switch ($_GET["operation"]) {
    case 'login':
        login();
        break;
    case 'logout':
        logout();
        break;
    default:
        $_SESSION['msg_warning'] = 'Operação inválida!!!';
        header("location:../View/message.php");
        break;
}

function logout()
{
    unset($_SESSION["user_data"]);
    header("location:../../index.html");
    exit;
}

function login()
{
    if (empty($_POST)) {
        $_SESSION["msg_error"] = "Ops, houve um erro inesperado!!!";
        header("location:../View/message.php");
        exit;
    }

    $email = $_POST["user_email"];
    $password = $_POST["user_password"];

    $users = array(
        array(
            "name" => "João",
            "username" => "joao",
            "password" => password_hash("12345678", PASSWORD_DEFAULT),
        ),
        array(
            "name" => "Maria",
            "username" => "maria",
            "password" => password_hash("12345678", PASSWORD_DEFAULT),
        )
    );
    
    foreach ($users as $user) {
        if ($user["email"] == $email && password_verify($password, $user["password"])) {
            $_SESSION["user_data"] = $user["name"];
            header("location:../View/dashboard.php");
            exit;
        }
    }

    $_SESSION["msg_warning"] = "Usuário ou senha inválidos!!!";
    header("location:../View/message.php");
    exit;
}
