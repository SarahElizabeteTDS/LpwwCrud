<?php

require_once(__DIR__ . "/../model/Curso.php");
require_once(__DIR__ . "/../util/Connection.php");

class CursoDAO
{
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Connection::getConnection();
    }

    public function listar()
    {
        $sql = "SELECT * FROM cursos ORDER BY nome";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapCursos($result);
    }

    private function mapCursos(array $result)
    {
        $cursos = array();

        foreach($result as $r)
        {
            $curso = new Curso();
            $curso->setId($r["id"]);
            $curso->setNome($r["nome"]);
            $curso->setTurno($r["turno"]);

            array_push($cursos, $curso);
        }

        return $cursos;
    }
}