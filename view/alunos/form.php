<?php

require_once(__DIR__ . "/../../controller/CursoController.php");

$cursoCont = new CursoController();

include_once(__DIR__ . "/../include/header.php");

?>

<h3>Cadastrar Alunos</h3>

<form action="" method="POST">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Digite o nome do aluno">
    </div>
    <div>
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" placeholder="Digite a idade do aluno">
    </div>
    <div>
        <label for="estrangeiro">Estrangeiro:</label>
        <select name="estrangeiro" id="estrangeiro">
            <option value="">Selecione</option>
            <option value="S">Sim</option>
            <option value="N">Não</option>
        </select>
    </div>
    <div>
        <label for="curso">Curso:</label>
        <select name="curso" id="curso">
            <option value="">Selecione</option>
            <?php foreach ($cursoCont->listar() as $curso): ?>
                <option value="<?= $curso->getId() ?>"> <?= $curso->getNome() ?> - <?= $curso->getTurnoTexto() ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <button type="submit">Cadastrar</button>
    </div>
</form>

<?php

include_once(__DIR__ . "/../include/footer.php");

?>