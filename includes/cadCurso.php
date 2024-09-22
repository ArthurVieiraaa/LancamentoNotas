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
    if (isset($_POST['nome'], $_POST['categoria'], $_POST['valor'], $_POST['dtInicio'])) {
        // Recebe e sanitiza os dados do formulário
        $nomeCurso = htmlspecialchars($_POST['nome']); // Evita inserção de tags HTML ou JS
        $categoria = htmlspecialchars($_POST['categoria']);
        $valor = htmlspecialchars($_POST['valor']);
        $dtInicio = htmlspecialchars($_POST['dtInicio']);

        try {
            // Verifica se o curso já existe no banco de dados
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM curso WHERE nomeCurso = :nomeCurso");
            $stmt->execute(['nomeCurso' => $nomeCurso]);

            if ($stmt->fetchColumn() > 0) {
                echo "Este curso já está cadastrado!";
            } else {
                // Insere os dados do curso no banco de dados
                $stmt = $pdo->prepare("INSERT INTO curso (nomeCurso, categoria, valor, dtInicio) VALUES (:nomeCurso, :categoria, :valor, :dtInicio)");
                $stmt->execute([
                    'nomeCurso' => $nomeCurso,
                    'categoria' => $categoria,
                    'valor' => $valor,
                    'dtInicio' => $dtInicio
                ]);

                echo "Curso cadastrado com sucesso!";
            }
        } catch (PDOException $e) {
            echo "Erro ao cadastrar o curso: " . $e->getMessage();
        }
    } else {
        echo "Todos os campos são obrigatórios!";
    }
}
?>

<div class="cadusuario">
    <h1>Cadastro de Cursos:</h1>
    <div class="cadusuario-content">
        <form method="POST">
            <label for="nome">Nome do Curso:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o Nome..." required>

            <label for="categoria">Qual a Categoria:</label>
            <select name="categoria" id="categoria" required>
                <option value="Curso_Livre">Curso Livre</option>
                <option value="Curso_Tecnico">Curso Técnico</option>
                <option value="Curso_EAD">Curso EAD</option>
                <option value="Tecnologo">Tecnólogo</option>
                <option value="Workshop">Workshop</option>
                <option value="Graduacao">Graduação</option>
            </select>

            <label for="valor">Valor do Curso:</label>
            <input type="text" id="valor" name="valor" placeholder="Digite o Valor..." required>

            <label for="dtInicio">Data de Início do Curso:</label>
            <input type="date" id="dtInicio" name="dtInicio" required>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>