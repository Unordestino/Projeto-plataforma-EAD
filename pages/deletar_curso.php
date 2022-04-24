<?php
    include('lib/protect.php');
    protect(1);

    $id = intval($_GET['id']);
    if(isset($_POST['confirmar'])){
        include("lib/conexao.php");

        $mysql_query =  $mysqli->query("SELECT * FROM cursos WHERE id = '$id'") or die($mysqli->error);
        $curso = $mysql_query->fetch_assoc();

        if(unlink($curso['imagem'])){
            $mysqli->query("DELETE FROM cursos WHERE id = '$id'") or die ($mysqli->error);
        }

        die("<script>location.href=\"index.php?p=gerenciar_cursos\";</script>");
    }

    if(isset($_POST['recursar']))
        die("<script>location.href=\"index.php?p=gerenciar_cursos\";</script>");




    
?>

<!-- Page-header start -->

<!-- Page-header end -->

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Deletar Curso</h5>
                    <span>TEM CERTEZA QUE DESEJA DELETAR O CURSO ?</span>
                </div>
                <div class="card-block">
                    <form method="POST">           
                            <button  name="confirmar"  type="submit" class="btn btn-success" data-container="body" data-toggle="popover" title="" data-placement="bottom" 
                            data-content="<div class='color-code'>" data-original-title="Success color states">Sim
                            </button>
                            <button  name="recursar" type="submit" class="btn btn-danger" data-container="body" data-toggle="popover" title="" data-placement="bottom" 
                            data-content="<div class='color-code'>" data-original-title="Success color states">Não
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>