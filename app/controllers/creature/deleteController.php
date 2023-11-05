<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../../persistence/DAO/CreatureDAO.php');
require_once(dirname(__FILE__) . '/../../../app/models/Creature.php');

$creatureDAO = new CreatureDAO();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
//Llamo que hace la edición contra BD
    deleteAction();
}

function deleteAction() {
    $id = $_GET["id"];

    $creatureDAO = new CreatureDAO();
    $creatureDAO->delete($id);

    header('Location: ../../../index.php');
}