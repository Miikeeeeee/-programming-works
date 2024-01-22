<?php
    session_start();
    include("alertas.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <!-- MDB-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</head>
<style>
      body{
        font-family: candara;
    }
</style>
<body>
<form method="post">  
  <section class="vh-100" style="background-color: #B6B6B6;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <h3 class="mb-5">Login</h3>
              <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX-2">Email</label>
              </div>
              <div class="form-outline mb-4">
                <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX-2">Password</label>
              </div>
              <?php
                if(isset($_POST['botaologin']))
                {
                  if ($_SESSION['email_mal'] == "TRUE")
                  {
                    alertas_error("O email não esta registado");
                  }
                  else
                  {
                    if ($_SESSION['pass_mal'] == "TRUE")
                    {
                      alertas_error("A password esta incorreta");
                    }
                  }

                }
              ?>
                <button class="btn btn-primary btn-lg btn-block" name="botaologin" style="background-color: #FF8000;" type="submit">Login</button>
              <hr class="my-4">
                <button class="btn btn-lg btn-block btn-primary mb-2" name="botaocriar"style="background-color: black;" type="submit"></i>Criar conta</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
    if(isset($_POST['botaocriar']))
    {
      header("Location: registar_novo.php");
    }
      if(!isset($_SESSION['login']))
      {
          if(isset($_POST['botaologin']))
          {
              $encontrado = false;

              // Percorrer as arrays internas
              foreach ($_SESSION['registos'] as $array) 
              {
                  if (in_array($_POST['email'], $array)) {
                    // Se o valor for encontrado, definir encontrado como true e interromper o loop
                    $encontrado = true;
                    //Email que esta com o login feito
                    $_SESSION["email_login"] = $_POST['email'];
                    $_SESSION['email_mal'] = "FALSE";
                    break;
                  }
              }

                // Verificar se o valor foi encontrado
              if ($encontrado) 
              {

                    // Durante o foreach, $linha recebe a chave (índice) do elemento atual,
                    // e $itens recebe o valor associado a essa chav
                foreach ($_SESSION['registos'] as $linha => $itens) {
                  // A função array_search retorna a chave (posição) do valor se encontrado.
  	              // O operador !== false verifica se a posição é encontrada e se não é falsa (ou seja, se é uma posição válida).
                  if (($coluna = array_search($_SESSION["email_login"], $itens)) !== false) {
                      $linhaEncontrada = $linha;
                      $_SESSION["pass_login"] = $_SESSION['registos'][$linha]['password'];
                      $_SESSION['pass_mal'] = "FALSE";
                      break; // Se encontrou, não é necessário continuar procurando
                  }
                }
                if($_SESSION["pass_login"] != $_POST['password'])
                {
                  $_SESSION['pass_mal'] = "TRUE";
                }
                else
                {
                  header("Location: home_page.php");
                }
              }
              else
              {
                $_SESSION['email_mal'] = "TRUE";
              }
          }
      }
  ?>
</form>
</body>
</html>