<?php
session_start();

if (isset($_SESSION["email"]) == false) {
    header("location: ../login/index.php");
}
$id = $_SESSION["id"];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

    <title>Minha Conta</title>
</head>

<body class="bg-dark text-light">

    <div class="container">

        <main class="container-fluid mt-5">
            <h3 id="titulo">MINHA CONTA</h3>

            <?php
            $id = $_SESSION["id"];

            $conexao = new mysqli("localhost", "root", "", "tcc");

            $sql = "select * from usuario where id_usuario='$id'";

            $resultado = mysqli_query($conexao, $sql);

            if ($resultado->num_rows > 0) {
                while ($rows = $resultado->fetch_assoc()) {
                    //VAR_DUMP($rows); // ver os valores que a query está retornando
            ?>

                    <form method="post" action="index.php" name="formulario" id="form-conta">
                        <div class="form-group mt-3">
                            <input name="nome" type="name" class="form-control place" id="nome" aria-describedby="nome" readonly value="<?php echo $rows['nome_usuario']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <input name="sobrenome" type="name" class="form-control place" id="nome" aria-describedby="sobrenome" readonly value="<?php echo $rows['sobrenome_usuario']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <input name="cpf" type="cpf" class="form-control place" id="cpf" aria-describedby="CPF" readonly value="<?php echo $rows['cpf_usuario']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <input name="email" type="email" class="form-control" id="email" value="<?php echo $rows['email_usuario']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <input name="nascimento" type="date" class="form-control" id="nascimento" readonly value="<?php echo $rows['nascimento_usuario']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <input name="endereco" type="text" class="form-control" id="endereco" value="<?php echo $rows['endereco_usuario']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <input name="cidade" type="text" class="form-control" id="cidade" value="<?php echo $rows['cidade_usuario']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <input name="estado" type="text" class="form-control" id="estado" value="<?php echo $rows['estado_usuario']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <input name="cep" type="text" class="form-control" id="cep" value="<?php echo $rows['cep_usuario']; ?>">
                        </div>
                        <div class="row">
                            <div class="col mt-3">
                                <input name="senha" type="password" class="form-control" value="<?php echo $rows['senha_usuario']; ?>">
                            </div>
                            <div class="col mt-3">
                                <input name="senha2" type="password" class="form-control" value="<?php echo $rows['senha_usuario']; ?>">
                            </div>
                        </div>

                        <div class=" btn-group mt-3" role="toolbar">
                            <button name="botao_deletar" type="submit" class="btn" id="button-deletar">DELETAR</a>
                            <button name="botao_alterar" type="submit" class="btn" id="button-alterar">ALTERAR</a>
                        </div>

                        <?php
                        if (isset($_POST["botao_deletar"])) deletar_usuario();
                        if (isset($_POST["botao_alterar"])) alterar_usuario();
                        
                        ?>
                    </form>

            <?php
                }
            } else {
                echo "outras opções";
            }
            ?>
        </main>

    </div>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<?php
function alterar_usuario()
{
    $id = $_SESSION["id"];
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $endereco = $_POST["endereco"];
    $cep = $_POST["cep"];
    $cpf = $_POST["cpf"];
    $nascimento = $_POST["nascimento"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $conexao = new mysqli("localhost", "root", "", "tcc");

    $sql =  "update usuario set nome_usuario='$nome', sobrenome_usuario='$sobrenome', cpf_usuario='$cpf', email_usuario='$email', 
            endereco_usuario='$endereco', senha_usuario='$senha', nascimento_usuario='$nascimento', cidade_usuario='$cidade', 
            estado_usuario='$estado', cep_usuario='$cep' where id_usuario='$id'";
    header("Refresh:0");
    mysqli_query($conexao, $sql);
    echo "<br><br><div class='alert alert-success' role='alert'>Alteração efetuada com sucesso!</div>";
    mysqli_close($conexao);
};

function deletar_usuario()
{
    $id = $_SESSION["id"];
    $conexao =    new mysqli("localhost", "root", "", "tcc");
    $sql    =     "delete from usuario where id_usuario='$id'";
    mysqli_query($conexao, $sql);
    echo "<h3>Registro removido com sucesso!</h3>";
    mysqli_close($conexao);
    echo "<script>window.location.href='../login/index.php'</script>";
}

?>