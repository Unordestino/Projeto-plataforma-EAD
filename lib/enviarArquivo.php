<?php

function enviarArquivo($error, $size, $name, $temp_name){

    if($error)
        die("Falha ao enviar arquivo");

    if($size > 2097152)
        die('Arquivo muito grande!! Max: 2MB');
    
        $pasta = "upload/";
        $nomeDoArquivo = $name;
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != 'png' && $extensao != 'gif' && $extensao != 'jpeg')
        die('Tipo de arquivo não aceito');

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

    $deu_certo = move_uploaded_file($temp_name, $path);

    if($deu_certo)
        return $path;
    else    
        return false;
}

?>