<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['id'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente mais tarde!</div>"];
} elseif (empty($dados['setor'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
} elseif (empty($dados['title'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div>"];
} elseif (empty($dados['apoio'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div>"];
} 
else {
    $query_usuario= "UPDATE events SET setor=:setor, title=:title WHERE id=:id";
    
    $edit_usuario = $conn->prepare($query_usuario);
    $edit_usuario->bindParam(':setor', $dados['setor']);
    $edit_usuario->bindParam(':title', $dados['title']);
    $edit_usuario->bindParam(':apoio', $dados['apoio']);
    $edit_usuario->bindParam(':id', $dados['id']);

    if ($edit_usuario->execute()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário editado com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não editado com sucesso!</div>"];
    }
}

echo json_encode($retorna);