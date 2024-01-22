<?php
    session_start();
    $email  = $_POST['email'];
    $nome = $_POST['nome'];
    $atividade = $_POST['atividade'];
    $data_nasc = $_POST['data_nasc'];
    $password = $_POST['password'];
    $data_atual = date("Y-m-d");
    // Converta as datas em objetos DateTime
    $dataNascimentoObj = new DateTime($_SESSION['data_nasc']);
    $dataAtualObj = new DateTime($dataAtual);

    // Calcule a diferença entre as datas
    $interval = $dataNascimentoObj->diff($dataAtualObj);

    // A idade é armazenada na propriedade 'y' do objeto Interval
    $idade = $interval->y;


    if (!isset($_SESSION['registos'])) {
        $_SESSION['registos'] = array(
        );

        $newVariable = array(
            'nome' => 'ADMIN',
            'idade' => '0',
            'email' => 'admin@admin.pt',
            'atividade' => 'o',
            'password' => 'Admin'
        );

        $_SESSION['registos'][] = $newVariable;

    }
    
    // Passo 3: Adicione variáveis à matriz multidimensional
    $newVariable = array(
        'nome' => $_SESSION['nome'],
        'idade' => $idade,
        'email' => $_SESSION['email'],
        'atividade' => $_SESSION['atividade'],
        'password' => $_SESSION['password']
    );
    $_SESSION['registos'][] = $newVariable;

    header("location: home_page.php");
?>