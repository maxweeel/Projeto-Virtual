<?php require_once '../Controller/Auth_Verify.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP HelpDesk - Lista de livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body class="m-5">
    <nav class="bg-info d-flex justify-content-between p-3">
        <div>
            <a href="dashboard.php" class="text-white text-decoration-none">Dashboard</a>
            <a href="add-new-call.htlml" class="text-white text-decoration-none">Abrir chamado</a>
            <a href="#" class="text-white text-decoration-none">Listar chamados</a>
        </div>
        <a href="../Controller/Auth.php?operation=logout" class="text-white text-decoration-none">Sair</a>
    </nav>
    <main class="m-5">
        <table class="table table-bordered table-primary">
            <thead>
                <th>#</th>
                <th>Titulo do livro</th>
                <th>Author</th>
                <th>Capitulos</th>
                <th>Descrição</th>
                <th>Gênero</th>
            </thead>
            <tbody>
                <?php
                if (empty($_SESSION["list_of_books"])) :
                ?>
                    <td colspan=6 class="text-center fw-bold">
                        Não existem livros cadastrados
                    </td>
                <?php
                endif;
                foreach ($_SESSION["list_of_books"] as $book) :
                ?>
                    <tr>
                        <td>
                            <?= $book["id"] ?>
                        </td>
                        <td>
                            <?= $book["title_book"] ?>
                        </td>
                        <td>
                            <?= $book["gender"] ?>
                        </td>
                        <td>
                            <?= $book["chapters"] ?>
                        </td>
                        <td>
                            <?= $book["author"] ?>
                        </td>
                        <td>
                            <?= $book["description"] ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="../Controller/Register.php?operation=findOne&code=<?= $book["id"] ?>" class="btn btn-warning" title="Editar chamado">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="../Controller/Register.php?operation=delete&code=<?= $book["id"] ?>" class="btn btn-danger" title="Deletar o chamado">
                                <i class="bi bi-trash"></i>
                            </a>
                            </div>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>