<?php
include("lib/conexao.php");
include('lib/protect.php');
protect(0);

if(!isset($_SESSION))
    session_start();

$id_usuario = $_SESSION['usuario'];
$sql_query = $mysqli->query("SELECT * FROM cursos WHERE id IN (SELECT id_curso FROM relatorio WHERE id_usuario = '$id_usuario')") or die($mysqli->error);




?>

<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Meus Cursos</h4>
                    <span>Estes são os cursos que você já possui</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">Meus Crusos</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="page-body">
    <div class="row">
        <div class="col-sm-4">
            
        <?php if(isset($sql_query)) { while($cursos = $sql_query->fetch_assoc()) {  ?>
                <div class="card">
                <div class="card-header">
                    <h5><?php echo $cursos['titulo'];?></h5>
                </div>
                <div class="card-block">
                    <img src="<?php echo $cursos['imagem']; ?>" class="img-fluid mb-3" alt="">
                    <p>
                        <?php echo $cursos['descricao_curta']; ?>
                    </p>
                    <form method="GET" action="index.php">
                        <input type="hidden" name="p" value="acessar">
                        <input type="hidden" name="id" value="<?php echo $cursos['id']; ?>">
                        <button type="submit" class="btn form-control btn-out-dashed btn-primary btn-square">Acessar</button>
                    </form>
                </div>       
            </div>
          <?php }}?>
        </div>
    </div>
</div>

            