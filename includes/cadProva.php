<?php
$host = 'localhost';  // ou '127.0.0.1'
$dbname = 'projetoads';  // Substitua pelo nome do seu banco de dados
$usuario = 'root';  // Substitua pelo seu usuário do banco de dados
$password = '';  // Substitua pela sua senha do banco de dados

// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se todos os campos esperados foram recebidos
    if (isset($_POST['materia'], $_POST['assunto'], $_POST['prova'], $_POST['data'])) {
        // Recebe e sanitiza os dados do formulário
        $materia = htmlspecialchars($_POST['materia']); // Evita inserção de tags HTML ou JS
        $assunto = htmlspecialchars($_POST['assunto']);
        $prova = htmlspecialchars($_POST['prova']);
        $data = htmlspecialchars($_POST['data']);

        try {
            // Verifica se a prova já existe no banco de dados
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM avaliacao WHERE materia = :materia AND assunto = :assunto");
            $stmt->execute([
                'materia' => $materia,
                'assunto' => $assunto
            ]);

            if ($stmt->fetchColumn() > 0) {
                echo "Esta prova já está cadastrada!";
            } else {
                // Insere os dados da prova no banco de dados
                $stmt = $pdo->prepare("INSERT INTO avaliacao (materia, assunto, prova, data) VALUES (:materia, :assunto, :prova, :data)");
                $stmt->execute([
                    'materia' => $materia,
                    'assunto' => $assunto,
                    'prova' => $prova,
                    'data' => $data
                ]);

                echo "Prova cadastrada com sucesso!";
            }
        } catch (PDOException $e) {
            echo "Erro ao cadastrar a prova: " . $e->getMessage();
        }
    } else {
        echo "Todos os campos são obrigatórios!";
    }
}
?>


<div class="cadusuario">
    <h1>Cadastro de Provas:</h1>
    <div class="cadusuario-content">
        <form method="POST">
            <label for="materia">Nome da Materia:</label>
            <input type="text" id="materia" name="materia" placeholder="Digite a Materia..." required>

            <label for="assunto">Nome do Assunto:</label>
            <input type="text" id="assunto" name="assunto" placeholder="Digite o Assunto..." required>

            <label for="prova">Link da Prova:</label>
            <input type="text" id="prova" name="prova" placeholder="Insira o link da Prova..." required>

            <label for="data">Data da Prova:</label>
            <input type="date" id="data" name="data" required>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>