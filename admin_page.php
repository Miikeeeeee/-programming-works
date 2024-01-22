<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin</title>
</head>
<style>
    body{
        background-color: #B6B6B6;
        font-family: candara;
    }
    .corpo{
        position: absolute;
        margin-top: 15rem;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 10px;
        background-color: white; /* Cor de fundo para visualização */
        padding: 20px; /* Espaçamento interno para visualização */

    }

    .voltar{
        position: absolute;
        bottom: 1rem;
        right: 2rem;
        background-color: #FF8000;
        color: white;
    }
    .voltar:hover {
        border: 2px solid black;
    }
</style>
<body>
    <div class="container corpo">
        <h2><b>Usuários</b></h2> 
                <?php
                    echo '<table class="table"><thead>';
                    echo "<tr><th>Nome</th><th>Email</th><th>Idade</th><th>Atividade</th><th>Password</th></tr>";
                    echo "</thead><tbody>";
                    foreach ($_SESSION["registos"] as $linha) {
                        echo '<tr>';
                        echo '<td>' . $linha['nome'] . '</td>';
                        echo '<td>' . $linha['email'] . '</td>';
                        echo '<td>' . $linha['idade'] . '</td>';
                        echo '<td>' . $linha['atividade'] . '</td>';
                        echo '<td>' . $linha['password'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                    echo 'Infos Atividade<br>';
                    echo '1 -> Baixa atividade(Nenhum exercicio semanal)<br>';
                    echo '2 -> Moderada atividade(1 a 3 vezes de exercicio semanal)<br>';
                    echo '3 -> Elevada atividade(3 a 5 vezes de exercicio semanal)<br>';
                    echo '4 -> Muito elevada atividade(5 a 7 vezes de exercicio semanal)<br>';
                ?>
                
            <form action="home_page.php">
                <button type="submit" class="btn btn-white voltar" name = "voltar">Ir para menu principal</button>
            </form> 
    </div>
</body>
</html>