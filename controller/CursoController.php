<?php

require_once(__DIR__ . "/../dao/CursoDAO.php");

class CursoController 
{
    private CursoDAO $cursoDao;

    public function __construct() 
    {
        $this->cursoDao = new CursoDAO();
    }

    public function listar() 
    {
        return $this->cursoDao->listar();
    }
}