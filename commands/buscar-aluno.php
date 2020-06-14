<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

/** @var Aluno[] $alunosList */

$alunosList = $alunoRepository->findAll();

foreach ($alunosList as $aluno ) {

    $telefones = $aluno
        ->getTelefones()
        ->map( function (Telefone $telefone) {
            return $telefone->getNumero();
    })
        ->toArray();

    echo "\n ID:{$aluno->getId()} \n Nome:{$aluno->getNome()} ";
    echo "\n Telefones: " . implode( " , " , $telefones) . " \n\n";

}


// $alunoBruno = $alunoRepository->find(1);
// echo " \n Aluno especifico:{$alunoBruno->getNome()}";