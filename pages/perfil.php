<?php
include("lib/conexao.php");
include("lib/enviarArquivo.php");
include('lib/protect.php');
protect(0);

$id = intval($_SESSION['usuario']);
if (isset($_POST['enviar'])) {


    $nome = $mysqli->escape_string($_POST['nome']);
    $email = $mysqli->escape_string($_POST['email']);
    $senha = $mysqli->escape_string($_POST['senha']);
    $rsenha = $mysqli->escape_string($_POST['rsenha']);


    $erro = array();
    if (empty($nome))
        $erro[] = "Preencha o nome";

    if (empty($email))
        $erro[] = "Preencha o email";

    if ($rsenha != $senha)
        $erro[] = "As senhas não coferem";

    if (count($erro) == 0) {

        $sql_code = "UPDATE usuarios SET
        nome = '$nome',
        email = '$email'
        WHERE id = '$id'";

        if (!empty($senha)) {
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $sql_code = "UPDATE usuarios SET
            nome = '$nome',
            email = '$email',
            senha = '$senha'
            WHERE id = '$id'";
        }

        $mysqli->query($sql_code) or die($mysqli->error);
        die("<script>location.href=\"index.php?p=perfil\";</script>");
    }
}

$sql_query = $mysqli->query("SELECT * FROM usuarios WHERE id = '$id'") or die($mysqli->error);
$usuario = $sql_query->fetch_assoc();
?>


<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-6">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Editar Usuário</h4>
                    <span>Preencha as informações e clique em Salvar</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="index.php?p=gerenciar_usuarios">
                            Gerenciar Usuário
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Editar Usuário</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">

            <?php if (isset($erro) && count($erro) > 0) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($erro as $e) {
                        echo "$e<br>";
                    }   ?>
                </div>
            <?php } ?>


            <div class="card">
                <div class="card-header">
                    <h5For>Formulário de Cadastro</h5For>
                </div>
                <div class="card-block ">

                    <form action="" method="POST">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form.group">
                                    <label for="">Nome</label>
                                    <input type="text" name="nome" value="<?php echo $usuario['nome'] ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form.group">
                                    <label for="">E-mail</label>
                                    <input type="text" name="email" value="<?php echo $usuario['email'] ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4"></div>

                            <div class="col-lg-4">
                                <div class="form.group">
                                    <label for="">Senha</label>
                                    <input type="password" name="senha" value="" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form.group">
                                    <label for="">Repita a senha</label>
                                    <input type="password" name="rsenha" value="" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <a href="index.php?p=gerenciar_usuarios" class="btn btn-primary btn-round m-2"><i class="ti-arrow-left"> Voltar</i></a>
                                <button name="enviar" type="submit" class="btn btn-success btn-round float-right m-2"><i class="ti-save"> Salvar</i></button>

                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>