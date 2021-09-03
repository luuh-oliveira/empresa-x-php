<?php

require("./funcoes.php");

$funcionarios = lerArquivo("./empresaX.json");



?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Funcionários</title>
</head>

<body>
    <div class="paginaFuncionarios">
        <h1>Funcionários da empresa X</h1>
        <form action="">
            <div class="campoBusca">
            <label for="buscar">Pesquisar por nome, sobrenome ou departamento</label>
            <input name="buscar" type="text" placeholder="Digite o nome, sobrenome ou departamento">
            </div>
            <button>&#128269;</button>
        </form>
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
                </tr>
            <?php
            endforeach;
            ?>
        </table>

    </div>


</body>

</html>