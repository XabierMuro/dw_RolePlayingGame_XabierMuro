<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/CreatureDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Creature.php');
require_once(dirname(__FILE__) . '/../../app/models/validations/ValidationRules.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Llamo a la función en cuanto se redirija el action a esta página
    createAction();
}

function createAction() {
    $name = ValidationsRules::test_input($_POST["name"]);
    $descriprion = ValidationsRules::test_input($_POST["description"]);
    $avater = ValidationsRules::test_input($_POST["avatar"]);
    $attackPower = ValidationsRules::test_input($_POST["attackPower"]);
    $lifeLevel = ValidationsRules::test_input($_POST["lifeLevel"]);
    $weapon = ValidationsRules::test_input($_POST["weapon"]);
    // TODOD hacer uso de los valores validados 
    $creature = new Creature();
    $creature->setName($_POST["name"]);
    $creature->setdescription($_POST["description"]);
    $creature->setAvatar($_POST["avatar"]);
     $creature->setAttackPower($_POST["attackPower"]);
      $creature->setLifeLevel($_POST["lifeLevel"]);
       $creature->setWeapon($_POST["Weapon"]);

    //Creamos un objeto CreatureDAO para hacer las llamadas a la BD
    $creatureDAO = new CreatureDAO();
    $creatureDAO->insert($creature);
    
    header('Location: ../../index.php');
    
}
?>

