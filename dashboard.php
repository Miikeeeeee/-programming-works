<?php
    session_start();

    if (isset($_GET['acao']) && $_GET['acao'] == 'redirecionar') 
    {
        $_SESSION['email_login'] = "";
        header('Location: home_page.php');
        exit(); // Certifique-se de sair após o redirecionamento
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
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <!-- Scripts para teste-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>DASHBOARD</title>

    <style>
        body, html {
            font-family: candara;
            height: 100%;
            background-color: #B6B6B6;
        }

        .retangulo-clique {
            position:absolute;
            width: 52rem;
            height: 6rem;
            background-color: white;
            margin: 0 auto;
            cursor: pointer;
            top: 11rem;
            right: 4rem;
            border-radius: 5px;
            border: 2px solid black;
        }

        .retangulo-clique1 {
            position:relative;
            width: 52rem;
            height: 6rem;
            background-color: white;
            margin: 0 auto;
            cursor: pointer;
            top: -35rem;
            right: 0rem;
            border-radius: 5px;
            border: 2px solid black;
        }

        .retangulo-clique2 {
            position:relative;
            width: 52rem;
            height: 6rem;
            background-color: white;
            margin: 0 auto;
            cursor: pointer;
            top: -32rem;
            right: 0rem;
            border-radius: 5px;
            border: 2px solid black;
        }

        .titulo {
            text-align: center;
            font-size: 80px;
            color: white;
            font-weight: bold;
            margin-top: 0.5px;
        }

        .fundo {
            position: relative;
            width: 60rem; /* ou qualquer valor desejado */
            height: 55rem; /* 100% da altura da viewport */
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            border-radius: 10px;
            border: 1px solid grey;
        }

        .logo {
            position: fixed;
            z-index: 1;
            top: 0;
            right: 0;
            max-width: 10%;
            max-height: 10%;
        }

        .objetivo {
            font-weight: bold;
            position:relative;
            width: 45rem;
            top: 4rem;
            left: 5rem;
            font-size: 20px;
            color: black;
        }

        .duracao{
            font-weight: bold;
            position:absolute;
            width: 45rem;
            top: 4rem;
            left: 26rem;
            font-size: 20px;
            color: black;
        }
        .icontempo {
            position: absolute; /* Use position: absolute para posicionar em relação ao .retangulo-clique */
            top: 1.4rem;  /* Ajuste conforme necessário */
            left: 18rem; /* Ajuste conforme necessário */
        }
        .textomodal{
            position:relative;
            font-weight: bold;
            font-size: 24px;
            top: 0.8rem;
            left: 3rem;
        }
        .textotempo{
            position: absolute; /* Use position: absolute para posicionar em relação ao .retangulo-clique */
            top: 1.8rem;  /* Ajuste conforme necessário */
            left: 23rem; /* Ajuste conforme necessário */
            font-weight: bold;
            font-size: 24px;
        }
        .iconlista {
            position: absolute; /* Use position: absolute para posicionar em relação ao .retangulo-clique */
            top: 2.3rem;  /* Ajuste conforme necessário */
            left: 26rem; /* Ajuste conforme necessário */
            width: 25px;
            height: 25px;
        }

        .textoexercicio{
            position: absolute; /* Use position: absolute para posicionar em relação ao .retangulo-clique */
            top: 1.85rem;  /* Ajuste conforme necessário */
            left: 28.2rem; /* Ajuste conforme necessário */
            font-weight: bold;
            font-size: 24px;
        }

        .start-text {
            color: black;
            font-size: 24px;
            font-weight: bold;
            position: absolute;
            top: 1.7rem;  /* Ajuste conforme necessário */
            left: 42rem;
        }

        .underline {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 3.5rem;
            height: 2px;
            background-color: red;
        }

        .texto{
            font-size: 18px;
            font-weight: bold;
        }

        .conta{
            position: absolute;
            top: 1.5rem;
            right: 2rem;
        }

        .conta_color{
            color: black;
            text-decoration: none;
        }

    </style>


</head>
<body>
    <div class="Corpo">
        <div class="container">
            <div class = "titulo">PLANO DE TREINO</div>
            <a href="home_page.php">
                <img class="logo" src="imagens\logo_pequena.png" alt="logo">
            </a>
            <div class = "fundo">
                <div class="conta">
                    <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle conta_color" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">';
                            echo '<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>';
                            echo '<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>';
                            echo '</svg>';
                            echo "&nbsp;&nbsp;";
                            echo "<b>", $_SESSION["email_login"], "</b>";
                        ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Definições conta</a></li>
                        <li><a class="dropdown-item" href="?acao=redirecionar">Terminar login</a></li>
                    </ul>
                    </div>
                </div>
                <p class="objetivo">Objetivo <br>
                Força, hipertrofia, Baixa gordura</p><br>
                <p class="duracao">Duracao <br>
                3 a 6 semanas</p>
            <!-- Acionar o Modal com uso de um botão -->
                <div class="retangulo-clique" data-toggle="modal" data-target="#myModal">
                        <p class="textomodal">Dia 1 <br>
                         PUSH DAY
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch icontempo" viewBox="0 0 16 16">
                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                        <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                    </svg>
                    <p class="textotempo">--</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check iconlista" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    <p class="textoexercicio">6</p>
                    <div class="start-text">
                        <span>S</span><span>T</span><span>A</span><span>R</span><span>T</span>
                        <div class="underline"></div>
                    </div>
                </div>
                <!-- Declarando o tipo e detalhes do Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        <!-- Aqui escrevemos o conteúdo do modal, como opções e detalhes da mensagem-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><b>PUSH DAY WORKOUT </b></h4>
                                </div>
                                    <!-- Corpo da mensagem -->
                                    <div class="modal-body texto">
                                        <p>1º exercicio: </p>
                                        <p>2º exercicio: </p>
                                        <p>3º exercicio: </p>
                                        <p>4º exercicio: </p>
                                        <p>5º exercicio: </p>
                                        <p>6º exercicio: </p>
                                    </div>
                                    <!-- O prompt da mensagem do Modal deverá estar aqui — é o rodapé do modal-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                            <button type="button" class="btn btn-primary">Finalizar!</button>
                                        </div>
                                    </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="retangulo-clique1" data-toggle="modal" data-target="#myModal">
                        <p class="textomodal">Dia 2 <br>
                        PULL DAY
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch icontempo" viewBox="0 0 16 16">
                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                        <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                    </svg>
                    <p class="textotempo">--</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check iconlista" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    <p class="textoexercicio">6</p>
                    <div class="start-text">
                        <span>S</span><span>T</span><span>A</span><span>R</span><span>T</span>
                        <div class="underline"></div>
                    </div>
                </div>
                <!-- Declarando o tipo e detalhes do Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        <!-- Aqui escrevemos o conteúdo do modal, como opções e detalhes da mensagem-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><b>PULL DAY WORKOUT </b></h4>
                                </div>
                                    <!-- Corpo da mensagem -->
                                    <div class="modal-body texto">
                                        <p>O conteúdo da mensagem enviada ao usuário deverá aparecer aqui. Avisos, considerações e o que mais você precisar.</p>
                                        <p>Você poderá inserir detalhes. <i>Lembrando que você poderá estilizar a fonte seu conteúdo.</i></p>
                                    </div>
                                    <!-- O prompt da mensagem do Modal deverá estar aqui — é o rodapé do modal-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                            <button type="button" class="btn btn-primary">Finalizar!</button>
                                        </div>
                                    </div>
                            </div>
                        </div>  
                    </div>
                </div>

                <div class="retangulo-clique2" data-toggle="modal" data-target="#myModal">
                        <p class="textomodal">Dia 3 <br>
                        LEG DAY
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch icontempo" viewBox="0 0 16 16">
                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                        <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                    </svg>
                    <p class="textotempo">--</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check iconlista" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    <p class="textoexercicio">6</p>
                    <div class="start-text">
                        <span>S</span><span>T</span><span>A</span><span>R</span><span>T</span>
                        <div class="underline"></div>
                    </div>
                </div>
                <!-- Declarando o tipo e detalhes do Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        <!-- Aqui escrevemos o conteúdo do modal, como opções e detalhes da mensagem-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><b>LEG DAY WORKOUT </b></h4>
                                </div>
                                    <!-- Corpo da mensagem -->
                                    <div class="modal-body texto">
                                        <p>O conteúdo da mensagem enviada ao usuário deverá aparecer aqui. Avisos, considerações e o que mais você precisar.</p>
                                        <p>Você poderá inserir detalhes. <i>Lembrando que você poderá estilizar a fonte seu conteúdo.</i></p>
                                    </div>
                                    <!-- O prompt da mensagem do Modal deverá estar aqui — é o rodapé do modal-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                            <button type="button" class="btn btn-primary">Finalizar!</button>
                                        </div>
                                    </div>
                            </div>
                        </div>  
                    </div>
                </div>
                
            </div>
        </div>
</body>
</html>