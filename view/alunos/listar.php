<?php
    require_once(__DIR__ . "/../../controller/AlunoController.php");

    //Chamar o controler para obter a lista de alunos
    $alunoCont = new AlunoController();
    $lista = $alunoCont->listar();

    //Implementar o header
    include_once(__DIR__ . "/../include/header.php");
?>

<h2>Cadastre seus alunos</h2>
<div>
   <a href="cadastrar.php">Cadastrar</a> 
</div>


<h3>Listagem de Alunos</h3>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Estrangeiro</th>
        <th>Curso</th>
        <th></th>
        <th></th>
    </tr>  

    <?php foreach($lista as $aluno): ?>
        <tr>
            <td><?= $aluno->getId() ?></td>
            <td><?= $aluno->getNome() ?></td>
            <td><?= $aluno->getIdade() ?></td>
            <td><?= $aluno->getEstrangeiroEspecifico() ?></td>
            <td><?= $aluno->getCurso() ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
    //Implementar o footer
    include_once(__DIR__ . "/../include/footer.php");
?>