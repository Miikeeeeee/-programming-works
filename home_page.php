<?php
    session_start();

    if (isset($_GET['acao']) && $_GET['acao'] == 'redirecionar') {
        if ($_SESSION["email_login"] == "admin@admin.pt")
        {
            header('Location: admin_page.php');
            exit(); // Certifique-se de sair após o redirecionamento
        }
        else
        {
            echo '<script>';
            echo 'alert("Só administrador é que pode aceder");';
            echo '</script>';
        }
    }
    if (isset($_GET['acao1']) && $_GET['acao1'] == 'redirecionar1') 
    {
        if ($_SESSION["email_login"] == "")
        {
            echo '<script>';
            echo 'alert("Tem de ter o login feito para poder entrar");';
            echo '</script>';
        }
        else
        {
            header('Location: dashboard.php');
            exit(); // Certifique-se de sair após o redirecionamento
        }
    }


?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Scripts para teste-->
    <title>HOMEPAGE</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: candara;
        }
        .login{
            background-color: black;
            border: 2px solid #FF8000;
            position:absolute;
            top: 1.3rem;
            right: 4rem;
        }
        .login:hover {
            color:white;
            background-color: black; /* Cor de fundo laranja ao passar o mouse */
            border: 0.2rem solid #A15000;
        }
        .login img {
            width: 20px;
            margin-right: 10px;
        }
        .menu {
            background-color: black;
            border: 2px solid #FF8000;
        }
        .menu:hover {
            color:white;
            background-color: black; /* Cor de fundo laranja ao passar o mouse */
            border: 0.2rem solid #A15000;
        }
        .menu1 {
            position: absolute;
            top: 1.3rem;
            left: 4rem;
        }
        .menu2 {
            background-color: black;
        }
        .menu2 .dropdown-item {
            color: white; /* Define a cor do texto para branco */
        }
        .menu2 .dropdown-item:hover {
            background-color: #FF8000; /* Define a cor de fundo ao passar o mouse */
        }
        .item1:hover {
            color:white;
            background-color: #FF8000; /* Cor de fundo laranja ao passar o mouse */
        }
        .item2:hover {
            color:white;
            background-color: #FF8000; /* Cor de fundo laranja ao passar o mouse */
        }

        .submeterlogin {
            background-color: black;
            border: 2px solid #FF8000;
        }
        .imagem {
            max-width: 100%;
            height: auto;
        }
        .barra-topo {
            background-color: black;
            height: 80px;
            border-bottom: 3px solid #FF8000;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed; /* Torna a barra superior fixa no topo da página */
            top: 0; /* A barra superior ficará sempre no topo da janela */
            width: 100%; /* A barra superior cobrirá toda a largura da tela */
            z-index: 999; /* Define uma ordem de empilhamento alta para que a barra fique acima de outros elementos */
        }
        .imagem-fundo {
            width: 100%;
            height: 100%; /* Defina a altura desejada para a imagem */
        }

        .Imagem-central {
            position: relative;
            text-align: center;
        }

        .quadrado1,
        .quadrado2,
        .quadrado3 {
            width: 28rem;
            background-color: #FF8000;
            opacity: 0.95;
            color: white;
            text-align: center;
            padding: 20px;
            display: inline-block;
            margin: 20px;
            position: relative;
            top: -3rem; /* Ajuste conforme necessário */
            vertical-align: top; /* Alinhe pela parte superior */
        }

        .quadrado1 h3,
        .quadrado2 h3,
        .quadrado3 h3 {
            font-weight: bold;
        }
</style>
</head>
<body>
    <div class="barra-topo">
        <img src="imagens/logo.png" alt="MR's Fit" class ="imagem">
        <form method="post" action="login.php">
            <button type="submit" class="btn btn-secondary login" >
                <img src="imagens\login.png" alt="login">
                Login
            </button>
        </form>
    <div class="dropdown menu1">
            <button class="btn btn-secondary dropdown-toggle menu" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Menu
            </button>
            <ul class="dropdown-menu menu2">
                <li><a class="dropdown-item" href="?acao=redirecionar">Painel Admin</a></li>
                <li><a class="dropdown-item" href="?acao1=redirecionar1">Planos de treino</a></li>
            </ul>
        </div>
    </div>
    <div class="Imagem-central">
        <img src="imagens\fundo.jpg" alt="Imagem" class="imagem-fundo">
        <div class="quadrado1">
            <h3>Bem-vindo ao Nosso Mundo Fitness!</h3>
            Explore nossa vasta coleção de artigos, vídeos e dicas de treinamento 
            para atingir seus objetivos de condicionamento físico. 
            Se você está procurando ganhar massa muscular, perder peso ou simplesmente se manter saudável, 
            temos o conhecimento e a motivação para ajudar você em sua jornada.
        </div>
        <div class="quadrado2">
            <h3>Transforme-se em uma Máquina Muscular</h3>
            No mundo do fisiculturismo, não há limites. Descubra os segredos para construir músculos, 
            ganhar força e transformar seu corpo em uma obra de arte. Com planos de treinamento personalizados, 
            nutrição eficaz e conselhos de especialistas, você está a um passo de alcançar seu potencial máximo.
        </div>
        <div class="quadrado3">
            <h3>Comunidade Fitness Unida</h3>
            Nossa comunidade de entusiastas do fitness é apaixonada por compartilhar conhecimento e apoiar uns aos outros. 
            Junte-se a nós e faça parte de uma rede de pessoas determinadas a alcançar seus objetivos de musculação. 
            Vamos superar limites juntos e conquistar um corpo mais saudável e forte.
        </div>
    </div>
</body>
</html>