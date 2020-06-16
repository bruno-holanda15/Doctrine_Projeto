<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Entity\Telefone;
use Doctrine\DBAL\Logging\DebugStack;

use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

/** @var Aluno[] $alunos */
$alunos = $alunoRepository->findAll();

foreach ($alunos as $aluno ) {

    echo "\n ID:{$aluno->getId()} \n Nome:{$aluno->getNome()} \n ";

    $telefones = $aluno
        ->getTelefones()
        ->map( function ( Telefone $telefone) {
            return $telefone->getNumero();
        })
        ->toArray();
    echo "\tTelefones: " . implode(",", $telefones) . "\n";
   
    $cursos = $aluno->getCursos();
    foreach ($cursos as $curso ) {
        
        echo "\tID Curso: {$curso->getId()}\n";
        echo "\tNome Curso: {$curso->getNome()}";
        echo "\n";
    }

}

echo "\n";
foreach ($debugStack->queries as $queryInfo) {
    echo $queryInfo['sql'] . "\n";
}

