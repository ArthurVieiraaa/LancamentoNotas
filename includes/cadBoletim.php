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
    if (isset($_POST['materia'], $_POST['media'], $_POST['feedbackAlunos'], $_POST['curso'])) {
        // Recebe e sanitiza os dados do formulário
        $materia = htmlspecialchars($_POST['materia']); // Evita inserção de tags HTML ou JS
        $media = htmlspecialchars($_POST['media']);
        $feedbackAlunos = htmlspecialchars($_POST['feedbackAlunos']);
        $curso = htmlspecialchars($_POST['curso']);

        try {
            // Verifica se a matéria já existe no banco de dados
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM boletim WHERE materia = :materia AND curso = :curso");
            $stmt->execute([
                'materia' => $materia,
                'curso' => $curso
            ]);

            if ($stmt->fetchColumn() > 0) {
                echo "Este boletim já está cadastrado!";
            } else {
                // Insere os dados do boletim no banco de dados
                $stmt = $pdo->prepare("INSERT INTO boletim (materia, media, feedbackAlunos, curso) VALUES (:materia, :media, :feedbackAlunos, :curso)");
                $stmt->execute([
                    'materia' => $materia,
                    'media' => $media,
                    'feedbackAlunos' => $feedbackAlunos,
                    'curso' => $curso
                ]);

                echo "Boletim cadastrado com sucesso!";
            }
        } catch (PDOException $e) {
            echo "Erro ao cadastrar o boletim: " . $e->getMessage();
        }
    } else {
        echo "Todos os campos são obrigatórios!";
    }
}
?>


<div class="cadusuario">
    <h1>Cadastro de Boletim:</h1>
    <div class="cadusuario-content">
        <form method="POST">
            <label for="nome">Nome da Materia:</label>
            <input type="text" id="materia" name="materia" placeholder="Digite o Nome..." required>

            <label for="media">Media:</label>
            <input type="text" id="media" name="media" placeholder="Digite a Media..." required>

            <label for="feedbackAlunos">Feedback:</label>
            <input type="text" id="feedbackAlunos" name="feedbackAlunos" placeholder="Feedback..." required>

            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" placeholder="Digite o curso..." required>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>