<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(1);

$code_cursos = "SELECT * FROM cursos";
$sql_query = $mysqli->query($code_cursos) or die($mysqli->error);
$num_cursos = $sql_query->num_rows;

?>

<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Gerenciar Cursos</h4>
                    <span>Administre os cursos cadastrados no sistema</span>
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
                    <li class="breadcrumb-item"><a href="#!">Gerenciar Cursos</a>
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
            <div class="card">
                <div class="card-header">
                    <h5>Todos os Cursos</h5>
                    <span><a href="index.php?p=cadastrar_curso">Clique aqui </a> Para cadastrar um curso</span>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Imagem</th>
                                    <th>Título</th>
                                    <th>Preco</th>
                                    <th>Gerenciar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php if($num_cursos == 0){ ?>

                                            <td colspan="5">Nenhum curso foi cadastrado</td>

                                        <?php
                                        }else{
                                     
                                        $cont = 1;
                                        while($cursos = $sql_query->fetch_assoc()){ 
                                         ?>
                                        <th scope="row"><?php echo $cont?></th>
                                        <td> <img src="<?php echo $cursos['imagem'] ?>" height="50px" alt=""> </td>
                                        <td><?php echo $cursos['titulo'] ?></td>
                                        <td>R$ <?php echo number_format($cursos['preco'], 2, ',', '.') ?></td>
                                        <td>
                                            <a href="index.php?p=editar_curso&id=<?php echo $cursos['id'];?>">Editar</a> | 
                                            <a href="index.php?p=deletar_curso&id=<?php echo $cursos['id'];?>">Deletar</a>
                                        </td>

                                    </tr>    
                                    <?php $cont++; 
                                    }
                                } ?>                                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>