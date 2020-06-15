<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;

use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);


/** @var Aluno[] $alunos */

$alunos = $alunoRepository->findAll();

foreach ($alunos as $aluno ) {

    echo "\n ID:{$aluno->getId()} \n Nome:{$aluno->getNome()} \n ";

    $cursos = $aluno
        ->getCursos()
        ->map( function ( Curso $curso) {
            return $curso->getNome();
        })
        ->toArray();
    echo "\t Cursos: " . implode(",", $cursos) . "\n";


}

