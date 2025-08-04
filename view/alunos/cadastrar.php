<?php
require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");
require_once(__DIR__ . "/../../model/Curso.php");

$msgErro = "";

//receber os dados do formulário
if(isset($_POST["nome"])) 
{
    $nome = trim($_POST["nome"]) ? trim($_POST["nome"]) : NULL;
    $idade = is_numeric($_POST["idade"]) && $_POST["idade"] > 0 ? $_POST["idade"] : NULL;
    $estrangeiro = trim($_POST["estrangeiro"]) ? trim($_POST["estrangeiro"]) : NULL;
    $curso = is_numeric($_POST["curso"]) ? $_POST["curso"] : NULL;

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
    $erros = $alunoController->cadastrar($aluno);

    if(! $erros)
    {
        header("location: listar.php");
    }else
    {
        $msgErro = implode("<br>", $erros);
        echo $msgErro;
    }
} 

include_once(__DIR__ . "/form.php");

?>