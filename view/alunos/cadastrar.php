<?php
require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");
require_once(__DIR__ . "/../../model/Curso.php");

//receber os dados do formulário
if(isset($_POST["nome"])) 
{
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $estrangeiro = $_POST["estrangeiro"];
    $curso = $_POST["curso"];

    $aluno = new Aluno();
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrangeiro);
    //ele espera um objeto Curso, então precisamos criar um novo objeto Curso e setar o ID
    $cursoObj = new Curso();
    $cursoObj->setId($curso);
    //setamos so o id pois o nome e turno não são necessários para cadastrar o aluno
    $aluno->setCurso($cursoObj);

    $alunoController = new AlunoController();
    $alunoController->cadastrar($aluno);
} 

include_once(__DIR__ . "/form.php");

?>