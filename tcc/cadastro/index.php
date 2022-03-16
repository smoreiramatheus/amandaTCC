<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

    <title>Cadastro</title>
</head>

<body class="bg-dark text-light">

    <div class="container">

        <main class="mt-5">
            <h3 id="titulo mt-5">Cadastro</h3>
            <form method="post" action="index.php" name="formulario" id="form-cadastro">
                <div class="form-group mt-3">
                    <input name="nome" type="name" class="form-control place" id="nome" aria-describedby="nome" placeholder="Nome">
                </div>
                <div class="form-group mt-3">
                    <input name="sobrenome" type="name" class="form-control place" id="nome" aria-describedby="sobrenome" placeholder="Sobrenome">
                </div>
                <div class="form-group mt-3">
                    <input name="cpf" type="cpf" class="form-control place" id="cpf" aria-describedby="CPF" placeholder="CPF">
                </div>
                <div class="form-group mt-3">
                    <input name="email" type="email" class="form-control" id="email" placeholder="E-mail">
                </div>
                <div class="form-group mt-3">
                    <input name="nascimento" type="date" class="form-control" id="nascimento" placeholder="Nascimento">
                </div>
                <div class="form-group mt-3">
                    <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Endereco">
                </div>
                <div class="form-group mt-3">
                    <input name="cidade" type="text" class="form-control" id="cidade" placeholder="Cidade">
                </div>
                <div class="form-group mt-3">
                    <input name="estado" type="text" class="form-control" id="estado" placeholder="Estado">
                </div>
                <div class="form-group mt-3">
                    <input name="cep" type="text" class="form-control" id="cep" placeholder="CEP">
                </div>
                <div>

                    <div class="row mt-3">
                        <div class="form-group col">
                            <input name="senha" type="password" class="form-control" placeholder="Senha">
                        </div>
                        <div class="form-group col">
                            <input name="senha2" type="password" class="form-control" placeholder="Confirmar senha">
                        </div>
                    </div>

                    <button name="botao_cadastrar" type="submit" class="btn mt-3" id="button-cadastrar">CADASTRAR</button>
                    <?php
                    if (isset($_POST["botao_cadastrar"])) cadastrar_usuario();
                    ?>
            </form>



            <div class="row justify-content-center mt-4">
                <a href="../login/index.php" class="possui-cadastro">JÁ POSSUI CADASTRO? CLIQUE AQUI!</a>
            </div>
        </main>

    </div>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<?php
function cadastrar_usuario()
{
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
    $sql = "insert into usuario(nome_usuario, sobrenome_usuario, cpf_usuario, email_usuario, endereco_usuario, senha_usuario, nascimento_usuario, cidade_usuario, estado_usuario, cep_usuario)
            values ('$nome', '$sobrenome', '$cpf', '$email', '$endereco', '$senha', '$nascimento', '$cidade', '$estado', '$cep')";
    if (mysqli_query($conexao, $sql)) {
        echo "<br><br><div class='alert alert-success' role='alert'>Cadastro efetuado com sucesso!</div>";
    };
    mysqli_close($conexao);
};
?>