<?php

$usuario = 'root';
$senha = '';
$database = 'projetoads';
$host = 'localhost';

// Conexão com o banco de dados usando mysqli
$mysqli = new mysqli($host, $usuario, $senha, $database);

// Verifica se houve algum erro na conexão
if ($mysqli->connect_error) {
    die('Falha ao conectar ao banco de dados: ' . $mysqli->connect_error);
}

// Definir o charset da conexão (opcional, mas recomendado)
$mysqli->set_charset('utf8mb4');

?>