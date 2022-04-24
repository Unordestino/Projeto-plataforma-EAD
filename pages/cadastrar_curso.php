<?php
include("lib/conexao.php");
include("lib/enviarArquivo.php");
include('lib/protect.php');
protect(1);

if(!isset($_SESSION))
    session_start();


if(isset($_POST['enviar'])){


    $titulo = $mysqli->escape_string($_POST['titulo']);
    $descricao_curta = $mysqli->escape_string($_POST['descricao_curta']);
    $preco = $mysqli->escape_string($_POST['preco']);
    $conteudo = $mysqli->escape_string($_POST['conteudo']);

    $erro = array();
    if(empty($titulo))
        $erro[] = "Preencha o título";
    

    if(empty($descricao_curta))
        $erro[] = "Preencha a descrição curta";
    

    if(empty($preco))
        $erro[] = "Preencha o preço";
    
    if(empty($conteudo))
        $erro[] = "Preencha o conteúdo";


    if(!isset($_FILES) || !isset($_FILES['imagem']) || $_FILES['imagem']['size'] == 0){

        $erro[] = "Selecione uma imagem no conteúdo";
    }


    if(count($erro) == 0){
        $deu_certo = enviarArquivo($_FILES['imagem']['error'], $_FILES['imagem']['size'], $_FILES['imagem']['name'], $_FILES['imagem']['tmp_name']);

        if($deu_certo !== false){
            $sql_code = "INSERT INTO cursos (titulo, descricao_curta, conteudo, data_cadastro, preco, imagem) VALUES (
                '$titulo',
                '$descricao_curta',
                '$conteudo',
                NOW(),
                '$preco',
                '$deu_certo')";
            $inserido =  $mysqli->query($sql_code);
            if(!$inserido)
                $erro[] = "Falha ao inserir no banco de dados: " . $mysqli->error;
            else{
                die("<script>location.href=\"index.php?p=gerenciar_cursos\";</script>");
            }
        }else{
            $erro[] = "Falha ao enviar a imagem";
        }

    }

}

?>


<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-6">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Cadastrar Curso</h4>
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
                        <a href="index.php?p=gerenciar_cursos">
                            Gerenciar Cursos
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Cadastrar Curso</a>
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

        <?php if(isset($erro) && count($erro) > 0){ ?>
            <div class="alert alert-danger" role="alert">  
                <?php  foreach($erro as $e) { echo "$e<br>";}   ?>
            </div>
        <?php } ?>


            <div class="card">
                <div class="card-header">
                    <h5For>Formulário de Cadastro</h5For>
                </div>
                <div  class="card-block " >

                    <form action="" method="POST" enctype="multipart/form-data">
                    
                        <div class="row">
                            <div class="col-lg-4"  >
                                <div class="form.group">
                                    <label for="">Título</label>
                                    <input type="text" name="titulo" value="" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-8" >
                                <div class="form.group">
                                    <label for="">Descrição Curta</label>
                                    <input type="text" name="descricao_curta" value="" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="form.group mt-3">
                                    <label for="">Imagem</label>
                                    <input type="file" name="imagem" value="" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form.group mt-3">
                                    <label for="">Preço</label>
                                    <input type="text" name="preco" value="" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form.group mt-3">
                                    <label  for="">Conteúdo</label>
                                    <textarea type="text" name="conteudo" rows="10" value="" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <a href="index.php?p=gerenciar_cursos" class="btn btn-primary btn-round m-2"><i class="ti-arrow-left"> Voltar</i></a>
                                <button name="enviar" type="submit" class="btn btn-success btn-round float-right m-2"><i class="ti-save"> Salvar</i></button>
                                
                            </div>
                                                
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>