<html>
    <head>
        <title>C.E. Buarque de Nazareth</title>
    </head>
    <body>
        <header>
            <h1>Cadastro de Aluno</h1>
            <p></p>
            <?php
            // Exemplo de código PHP embutido para mostrar a data atual
            $dataAtual = date('d/m/Y');
            echo "<p>Hoje é: $dataAtual</p>";

            if ($_SERVER["REQUEST_METHOD"] === "POST") {

                $caixa = $_POST["caixa"];
                $nome = $_POST["nome"];
                $curso = $_POST["curso"];

                echo "<p><strong>Caixa:</strong> " . $caixa . "</p>";
                echo "<p><strong>Nome:</strong> " . $nome . "</p>";
                echo "<p><strong>Curso:</strong> " . $curso . "</p>";
            }

            $hostname = "br1016.hostgator.com.br"; // Endereço do servidor
            $username = "lucama33_luciano"; // Nome de usuário do banco de dados
            $password = "Lcm75330466@"; // Senha do banco de dados
            $database = "lucama33_buarque"; // Nome do banco de dados
            // Conexão com o banco de dados
            $conn = mysqli_connect($hostname, $username, $password, $database);

            // Verifica a conexão
            if ($conn->connect_error) {
                die("Erro de conexão: " . $conn->connect_error);
            }

            // Dados para inserção
            // Consulta SQL para inserção
            $sql = "INSERT INTO alunos (caixa_aluno, nome_aluno, curso_aluno) VALUES ('$caixa','$nome','$curso')";

            // Executa a consulta
            if (mysqli_query($conn, $sql) === TRUE) {
                echo "Registro inserido com sucesso!";
            } else {
                echo "Erro na inserção: " . $conn->error;
            }
            mysqli_close($conn);
            ?>
            <p><a href = "formulario_aluno.php">Voltar ao formulário</a></p>
        </header>
    </body>
</html>
