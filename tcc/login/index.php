<?php
$conexao = new mysqli("localhost", "root", "", "tcc");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

    <title>Login</title>
</head>

<body class="bg-dark">

    <div class="container bg-dark text-light">

       

        <h3 class="mt-5">Login</h3>
        <?php fazer_login(); ?>
        <form id="form-login" name="form_login" action="index.php" method="post">
        
            <div class="mt-3 mb-3">
                <input type="email" name="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="mb-3">
                <input type="password" name="senha" class="form-control" placeholder="Senha">
            </div>
            <div  class=" btn-group mt-3 justify-content-between" role="toolbar">
                <div class="col">
                <a type="submit" class="btn btn-primary" href="../cadastro/index.php" id="button-criarconta">CRIAR CONTA</a>
                </div>
                <div class="col">
                <button type="submit" class="btn btn-primary" name="botao_entrar" id="button-entrar">ENTRAR</button>
                </div>
            </div>
           
        </form>

    </div>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php
function fazer_login()
{
    if (isset($_POST["botao_entrar"])) {
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $conexao = new mysqli("localhost", "root", "", "tcc");
        $sql = "select * from usuario where email_usuario='$email' and senha_usuario='$senha'";
        $resultado = mysqli_query($conexao, $sql);

        if ($reg = mysqli_fetch_array($resultado)) {
            session_start();
			$_SESSION["email"] = $reg["email_usuario"];
            $_SESSION["id"] = $reg["id_usuario"];
            $_SESSION["senha"] = $reg["senha_usuario"];
            $_SESSION["nome"] = $reg["nome_usuario"];
            $_SESSION["sobrenome"] = $reg["sobrenome_usuario"];
            $_SESSION["cep"] = $reg["cep_usuario"];
            $_SESSION["estado"] = $reg["id_usuario"];           
            $_SESSION["endereco"] = $reg["endereco_usuario"];
            $_SESSION["nascimento"] = $reg["id_usuario"];
            $_SESSION["id"] = $reg["id_usuario"];
            $_SESSION["cpf"] = $reg["cpf_usuario"];
            header("location: ../minha-conta/index.php");
        } else {
            echo "<h3>Usuario e senha invalidos !</h3>";
        }
        mysqli_close($conexao);
    }
}
?>