<?php 

require_once("config.php");

/*$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);*/


//carrega um usuário
/*
$root = new Usuario();

$root->loadById(4);

echo $root;*/

//carrega uma lista de usuários

/*
$lista = Usuario::getList();


//exibe em formato JSON
echo json_encode($lista);*/


//carrega uma lista de usuarios buscando pelo login
/*
$search = Usuario::search("u");

echo json_encode($search);
*/

//carrega um usuario usando o login e a senha
/*
$usuario = new Usuario();

$usuario->login("elias","1234");

echo $usuario;*/


//criando um novo usuário
/*
$aluno = new Usuario("aluno","@lun0");

$aluno->insert();

echo $aluno;*/

$usuario = new Usuario();

$usuario->loadById(9);

$usuario->update("professor","faeçf");

echo $usuario;




 ?>