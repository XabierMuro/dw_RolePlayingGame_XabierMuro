<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../../persistence/DAO/CreatureDAO.php');
require_once(dirname(__FILE__) . '/../../../app/models/Creature.php');
require_once(dirname(__FILE__) . '\..\..\..\app\models\validations\ValidationsRules.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Llamo a la función en cuanto se redirija el action a esta página
    createAction();
}

function createAction() {
    $name = ValidationsRules::test_input($_POST["name"]);
    $avater = ValidationsRules::test_input($_POST["avatar"]);
    $descriprion = ValidationsRules::test_input($_POST["description"]);
    $attackPower = ValidationsRules::test_input($_POST["attackpower"]);
    $lifeLevel = ValidationsRules::test_input($_POST["lifelevel"]);
    $weapon = ValidationsRules::test_input($_POST["weapon"]);
    // TODOD hacer uso de los valores validados 
    $creature = new Creature();
    $creature->setName($name);
    $creature->setAvatar($avater);
    $creature->setDecription($descriprion);
     $creature->setAttackPower($attackPower);
      $creature->setLifeLevel($lifeLevel);
       $creature->setWeapon($weapon);

    //Creamos un objeto CreatureDAO para hacer las llamadas a la BD
    $creatureDAO = new CreatureDAO();
    $creatureDAO->insert($creature);
    
    header('Location: ../../../index.php');
    
}
?>

