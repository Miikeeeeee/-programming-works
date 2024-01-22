<?php
    session_start();
    include("alertas.php");
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <title>REGISTAR</title>
    <style>
        body{
            background-color: #B6B6B6;
            font-family: candara;
        }
        .fundobranco{
            background-color: white;
            width: 40rem;
            height: 45rem;
            position: absolute;
            top: 52%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 12px;
        }

        .titulo{
            position: absolute;
            font-weight: bold;
            top: 8%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .nome{
            position: absolute;
            top: 18%;
            left: 6%;
            width: 35rem;
        }

        .inputs{
            position: absolute;
            top: 15%;
            left: 6%;
            width: 35rem;
        }

        .botao{
            background-color: #FF8000;
            color: white;
            width: 35rem;
            height: 3rem;
        }
        .logo{
            position: absolute;
            top: 1%;
            right: 1%;
            width: 7rem;
            height: 5rem;
        }
        
    </style>
</head>
<body>
    <div class="fundobranco">
        <h2 class="titulo">REGISTAR</h2>
        <a href="home_page.php">
            <img class="logo" src="imagens\logo_pequena.png" alt="logo pequena">
        </a>
        <form class="was-validated" method="post">
            <div class="inputs">
                <!-- <label for="nome">Nome Completo:</label> -->
                <input type="text" class="form-control" placeholder="Nome Completo" name="nome" id="nome" required><br>
                <!-- <label for="email">Email:</label> -->
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" required><br>
                <label for="data_nasc">Data de Nascimento:</label>
                <input type="date" class="form-control" name="data_nasc" id="data_nasc" required><br>
                <label for="atividade">Qual a sua atividade semanal:</label>
                    <select class="form-select" id="atividade" name="atividade" required>
                        <option value="1">Baixa atividade(Nenhum exercicio semanal)</option>
                        <option value="2">Moderada atividade(1 a 3 vezes de exercicio semanal)</option>
                        <option value="3">Elevada atividade(3 a 5 vezes de exercicio semanal)</option>
                        <option value="4">Muito elevada atividade(5 a 7 vezes de exercicio semanal)</option>
                    </select><br>
                <!-- <label for="password">Password:</label> -->
                <input type="password" class="form-control"  placeholder="Password"name="password" id="password" required><br>
                <!-- <label for="c_password">Confirmar Password:</label> -->
                <input type="password" class="form-control"  placeholder="Confirmar Password" name="c_password" id="c_password" required><br>
                
                <hr>
            <?php
                $testagem = 2;
                //Verifica se a sessão esta criada e não é null
                    if(!isset($_SESSION['registar']))
                    {
                        if(isset($_POST['botaoregistar']))
                        {
                            $password = strval($_POST['password']);
                            $c_password = strval($_POST['c_password']);
            
                            if (strlen($password) <= 8)
                            {
                                alertas_error("A password tem de ter mais de 8 caracteres");
                            }
                            else
                            {
                                if($password != $c_password)
                                {
                                    alertas_error("A confirmação de password e a password tem de ser iguais");
                                }
                                else
                                {
                                    if (!isset($_SESSION['registos'])) {
                                        //Meter as variaveis na sessão
                                        $_SESSION['nome'] = $_POST['nome'];
                                        $_SESSION['email'] = $_POST['email'];
                                        $_SESSION['data_nasc'] = $_POST['data_nasc'];
                                        $_SESSION['atividade'] = $_POST['atividade'];
                                        $_SESSION['password'] = $_POST['password'];
                                        header("Location: arrays.php");
                                    }
                                    else{
                                        foreach ($_SESSION['registos'] as $linha => $itens) {
                                            // Verificar se a variável está na linha
                                            if (($coluna = array_search($_POST["email"], $itens)) !== false) {
                                                $testagem = 1;
                                                alertas_error("Este email já esta registado");
                                                break; // Se encontrou, pode parar o loop
                                            }
                                        }
                                        if ($testagem == 2)
                                        {
                                            //Meter as variaveis na sessão
                                            $_SESSION['nome'] = $_POST['nome'];
                                            $_SESSION['email'] = $_POST['email'];
                                            $_SESSION['data_nasc'] = $_POST['data_nasc'];
                                            $_SESSION['atividade'] = $_POST['atividade'];
                                            $_SESSION['password'] = $_POST['password'];
                                            header("Location: arrays.php");
                                        }
                                    }
                            }
                        }
                    }
                }
            ?>
                <button type="submit" class="btn btn-light botao" name="botaoregistar">REGISTAR</button>
            </div>
        </form>
    </div>
</body>
</html>