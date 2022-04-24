<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(1);

$code_cursos = "SELECT * FROM usuarios";
$sql_query = $mysqli->query($code_cursos) or die($mysqli->error);
$num_usuarios = $sql_query->num_rows;

?>

<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Gerenciar Usuários</h4>
                    <span>Administre os usuários cadastrados no sistema</span>
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
                    <li class="breadcrumb-item"><a href="#!">Gerenciar usuários</a>
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
                    <h5>Todos os usuários</h5>
                    <span><a href="index.php?p=cadastrar_usuario">Clique aqui </a> Para cadastrar um usuários</span>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Créditos</th>
                                    <th>Data de Cadastro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php if($num_usuarios == 0){ ?>

                                            <td colspan="5">Nenhum curso foi cadastrado</td>

                                        <?php
                                        }else{
                                            $cont = 1;
                                        while($usuario = $sql_query->fetch_assoc()){ 
                                         ?>
                                        <th scope="row"><?php echo $cont;?></th>
                                        <td><?php echo $usuario['nome'] ?></td>
                                        <td><?php echo $usuario['email'] ?></td>
                                        <td>R$ <?php echo number_format($usuario['creditos'], 2, ',', '.') ?></td>
                                        <td>
                                            <a href="index.php?p=editar_usuario&id=<?php echo $usuario['id'];?>">Editar</a> | 
                                            <a href="index.php?p=deletar_usuario&id=<?php echo $usuario['id'];?>">Deletar</a>
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