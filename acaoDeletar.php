<?php

require("./funcoes.php");

$idFuncionario = $_GET["id"];

deletarFuncionário("./dados/empresaX.json", $idFuncionario);

header("location: index.php");

