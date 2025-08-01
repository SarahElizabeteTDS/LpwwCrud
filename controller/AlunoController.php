<?php

require_once(__DIR__ . "/../dao/AlunoDAO.php");

class AlunoController 
{
    private AlunoDAO $alunoDao;

    public function __construct()
    {
        $this->alunoDao = new AlunoDAO();
    }

    public function listar()
    {
        return $this->alunoDao->listar();
    }

    public function cadastrar(Aluno $aluno)
    {
        return $this->alunoDao->cadastrar($aluno);
    }
}