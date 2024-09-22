<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar a descrição
    $descricao = isset($_POST['descricao']) ? $conn->real_escape_string($_POST['descricao']) : '';

    // Validar e fazer upload da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem = $_FILES['imagem'];
        $nomeImagem = basename($imagem['name']);
        $pastaDestino = 'uploads/' . $nomeImagem;
        $tipoArquivo = strtolower(pathinfo($pastaDestino, PATHINFO_EXTENSION));

        // Verificar se é uma imagem
        $check = getimagesize($imagem['tmp_name']);
        if ($check === false) {
            die("O arquivo enviado não é uma imagem.");
        }

        // Extensões permitidas
        $extensoesPermitidas = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($tipoArquivo, $extensoesPermitidas)) {
            die("Somente arquivos JPG, JPEG, PNG e GIF são permitidos.");
        }

        // Mover o arquivo para a pasta de destino
        if (move_uploaded_file($imagem['tmp_name'], $pastaDestino)) {
            // Inserir dados no banco de dados
            $sql = "INSERT INTO posts (descricao, imagem) VALUES ('$descricao', '$nomeImagem')";

            if ($conn->query($sql) === TRUE) {
                echo "Post adicionado com sucesso!";
            } else {
                echo "Erro: ";
            }
        } else {
            echo "Erro ao fazer o upload da imagem.";
        }
    } else {
        echo "Imagem não enviada ou houve um erro.";
    }
}
?>

<div class="forum">
    <h1>Fórum:</h1>
    <button id="button-forum"><i class="fa-solid fa-plus"></i></button>
    <div id="forum" style="display: none;" class="toast">
        <div class="toast-container toast-centered">
            <div class="toast-content">
                <div class="toast-h">
                    <h5>Informações do Post:</h5>
                    <i id="close-forum" class="fa-solid fa-xmark"></i>
                </div>
                <div class="toast-b">
                    <form method="POST">
                        <label for="descricao">Descrição:</label>
                        <textarea id="descricao" name="descricao" placeholder="Digite a Descrição..." required></textarea>
                        <label for="imagem">Imagem:</label>
                        <input type="file" id="imagem" name="imagem" required>
                        <button type="submit">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h2>Adicionar Post:</h2>
    </form>
    <div class="forum-content">
        <div>
            <img src="assets/img/PC.jpg" alt="">
            <h3>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae reprehenderit quas consequatur saepe laudantium accusantium provident inventore veritatis hic maxime placeat, delectus praesentium nulla ratione et asperiores! Rerum, suscipit totam.</h3>
        </div>
        <div>
            <img src="assets/img/Sala.jpg" alt="">
            <h3>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur officiis in odit. Voluptatem sit eveniet doloremque, enim commodi accusamus voluptatum saepe, beatae, recusandae distinctio dolorem ut omnis aspernatur excepturi iusto.</h3>
        </div>
        <div>
            <img src="assets/img/Festa.jpg" alt="">
            <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum obcaecati placeat expedita dignissimos reiciendis saepe excepturi ullam neque pariatur libero quibusdam enim, consequatur amet animi iste nostrum facere consequuntur voluptas.</h3>
        </div>
    </div>
</div>