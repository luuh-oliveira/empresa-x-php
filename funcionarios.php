<?php

session_start();

require("./funcoes.php");

verificarLogin();

$funcionarios = lerArquivo("./dados/empresaX.json");

if (isset($_GET["buscar"]) && $_GET["buscar"] != "") {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["buscar"]);
}

$total = count($funcionarios);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./script.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>Funcionários</title>
</head>

<body>
    <header>
        <div class="header">
            <h3>Usuário: <?= strtoupper($_SESSION["usuario"]) ?></h3>
            <h3>Login efetuado em: <?= $_SESSION["data_hora"] ?></h3>
            <h3>
                <a class="material-icons" href="processa_login.php?logout=true">logout</a>
            </h3>
        </div>
    </header>
    <main>
        <div class="paginaFuncionarios">
            <h1>Funcionários da empresa X</h1>
            <p>A empresa conta com <?= $total ?> funcionários</p>
            <form>
                <div class="campoBusca">
                    <label for="buscar">Pesquisar por nome, sobrenome ou departamento</label>
                    <input name="buscar" type="text" placeholder="Digite o nome, sobrenome ou departamento">
                </div>
                <button>&#128269;</button>
            </form>
            <button id="btnAddFuncionario">Adicionar Funcionário</button>
            <br /><br />
            <div class="modal-form">
                <form id="form-funcionario" action="acoes.php" method="POST">
                    <h1>Adicionar funcionário</h1>
                    <input type="text" placeholder="Digite o id" name="id" />
                    <input type="text" placeholder="Digite o primeiro nome" name="first_name" />
                    <input type="text" placeholder="Digite o sobrenome" name="last_name" />
                    <input type="text" placeholder="Digite o e-mail" name="email" />
                    <input type="text" placeholder="Digite o sexo" name="gender" />
                    <input type="text" placeholder="Digite o IP" name="ip_address" />
                    <input type="text" placeholder="Digite o país" name="country" />
                    <input type="text" placeholder="Digite o departamento" name="department" />
                    <button class="salvar">Salvar</button>
                </form>
            </div>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>E-mail</th>
                    <th>Sexo</th>
                    <th>Endereço IP</th>
                    <th>País</th>
                    <th>Departamento</th>
                    <th>Ações</th>
                </tr>
                <?php
                foreach ($funcionarios as $funcionario) :
                ?>
                    <tr>
                        <td><?= $funcionario->id ?></td>
                        <td><?= $funcionario->first_name ?></td>
                        <td><?= $funcionario->last_name ?></td>
                        <td><?= $funcionario->email ?></td>
                        <td><?= $funcionario->gender ?></td>
                        <td><?= $funcionario->ip_address ?></td>
                        <td><?= $funcionario->country ?></td>
                        <td><?= $funcionario->department ?></td>
                        <td>
                            <button onclick="editar(<?= $funcionario->id ?>)" class="material-icons">edit</button>
                            <button onclick="deletar(<?= $funcionario->id ?>)" class="material-icons">delete</button>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </table>

        </div>
    </main>


</body>

</html>