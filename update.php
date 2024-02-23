<?php

// ============================== Update ==============================

//  Update utilizando método prepare(), com validação por meio de bindValue()
$update = $pdo->prepare("UPDATE departamento SET nomeDepartamento = ':nomeD' WHERE codDepartamento = :codD");
$update->bindValue(":nomeD","Gerencia de projetos");
$update->bindValue(":codD",5);
$update->execute();

//  Update utilizando método prepare(), com validação por meio de bindParam()
$update = $pdo->prepare("UPDATE departamento SET nomeDepartamento = ':nomeD' WHERE codDepartamento = :codD");
$update->bindValue(":nomeD","Gerencia de projetos");
$update->execute();