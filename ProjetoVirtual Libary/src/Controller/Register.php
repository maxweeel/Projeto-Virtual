<?php

namespace QI\VirtualLibary\Controller;

use Exception;
use QI\VirtualLibary\Model\Book;
use QI\VirtualLibary\Model\Repository\CallRepository;

require_once dirname(dirname(__DIR__)) . "/vendor/autoload.php";

session_start();
switch ($_GET["operation"]) {
    case "insert":
        insert();
        break;
    case "findAll":
        findAll();
        break;
    case "findOne":
        findOne();
        break;
    case "delete":
        delete();
        break;    
    default:
        $_SESSION["msg_warning"] = "Operação inválida!!!";
        header("location:../View/message.php");
        exit;
}

function insert()
{
    if (empty($_POST)) {
        $_SESSION["msg_error"] = "Ops, houve um erro inesperado!!!";
        header("location:../View/message.php");
        exit;
    }
    try {
        $book = new Book(
            $_POST["book_title"],
            $_POST["author_name"],
            $_POST["chapter_number"],
            $_POST["description_book"],
            $_POST["gender_book"],
        );
        $call_repository = new CallRepository();
        $result = $call_repository->insert($book);
        if ($result) {
            $_SESSION["msg_success"] = "Parabéns, seu chamado foi registrado com sucesso!!!";
        } else {
            $_SESSION["msg_warning"] = "Lamento, não foi possível registrar seu chamado!!!";
        }
    } catch (Exception $exception) {
        $_SESSION["msg_error"] = "Ops. Houve um erro inesperado em nossa base de dados!!!";
        $log = $exception->getFile() . " - " . $exception->getLine() . " - " . $exception->getMessage();
        Logger::writeLog($log);
    } finally {
        header("location:../View/message.php");
        exit;
    }
}

function findAll()
{
        $call_repository = new CallRepository();
        $_SESSION["list_of_books"] = $call_repository->findAll();
        header("location:../View/list-of-books.php");
}

function findOne()
{
  
}

function delete(){
    $id = $_GET["code"];
    if(empty($id)){
        $_SESSION["msg_error"] = "O código do chamado é inválido";
        header("location:../View/message.php");
        exit;
    }
    try{
    $call_repository = new CallRepository();
    $result = $call_repository->delete($id);
    if($result){
        $_SESSION["msg_success"] = "Chamado registrado com sucesso!!!";
    }else{
        $_SESSION["msg_warning"] = "Lamento, não foi possivel remover o chamado!!!";
    }
 }catch(Exception $exception){
    $_SESSION["msg_error"] = "Ops. Houve um erro inesperado em nossa base de dados!!!";
    $log = $exception->getFile() . " - " . $exception->getFile() . " - " . $exception->getMessage();
    Logger::writeLog($log);
 }finally{
    header("location:../View/message.php");
 }
}



