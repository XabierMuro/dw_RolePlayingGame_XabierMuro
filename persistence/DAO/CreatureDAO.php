<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CreatureDAO
 *
 * @author xabie
 */
require_once(dirname(__FILE__) . '..\..\conf\PersistentManager.php');

class CreatureDAO {
    
    const CANDIDATE_TABLE = 'creature';

    //Conexión a BD
    private $conn = null;

    //Constructor de la clase
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    public function selectAll() {
        $query = "SELECT * FROM " . CandidateDAO::CANDIDATE_TABLE;
        $result = mysqli_query($this->conn, $query);
        $creatures= array();
        while ($creatureBD = mysqli_fetch_array($result)) {

            $creature = new Creature();
            
            $creature->setIdCreature($creatureBD["idCreature"]);
            $creature->setName($creatureBD["name"]);
            $creature->setDecription($creatureBD["description"]);
            $creature->setAvatar($creatureBD["avatar"]);
            $creature->setAttackPower($creatureBD["attackPower"]);
            $creature->setLifeLevel($creatureBD["lifeLevel"]);
            $creature->setWeapon($creatureBD["weapon"]);
            
            
            array_push($creatures, $creature);
        }
        return $creatures;
    }

    public function insert($creature) {
        $query = "INSERT INTO " . CandidateDAO::CANDIDATE_TABLE .
                " ( name, description, avatar, attackPower, lifeLevel, weapon) VALUES(?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $name = $creature->getName();
        $description = $creature->getDescription();
        $avatar = $creature->getAvatar();
        $attackPower = $creature->getAttackPower();
        $lifeLevel = $creature->getLifeLevel();
        $weapon = $creature->getWeapon();
        
        mysqli_stmt_bind_param($stmt, 'sssiis', $name, $description, $avatar, $attackPower, $lifeLevel, $weapon);
        return $stmt->execute();
    }

    public function selectById($id) {
        $query = "SELECT name, surname, email FROM " . CandidateDAO::CANDIDATE_TABLE . " WHERE idCreature=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $name, $description, $avatar, $attackPower,$lifeLevel,$weapon);

        $creature = new Creature();
        while (mysqli_stmt_fetch($stmt)) {
            $creature->setIdCreature($id);
            $creature->setName($name);
            $creature->setDecription($description);
            $creature->setAvatar($avatar);
            $creature->setAttackPower($attackPower);
            $creature->setLifeLevel($lifeLevel);
            $creature->setWeapon($weapon);
       }

        return $creature;
    }

    public function update($creature) {
        $query = "UPDATE " . CandidateDAO::CANDIDATE_TABLE .
                " SET name=?, description=?, avatar=?, attackPower=?, lifeLevel=?, weapon=?"
                . " WHERE idCandidate=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $name = $creature->getName();
        $description= $creature->getDescription();
        $avatar = $creature->getAvatar();
        $attackPower = $creature->getAttackPower();
        $lifeLevel = $creature->getLifeLevel();
        $weapon = $creature->getWeapon();
        
        mysqli_stmt_bind_param($stmt, 'sssiis', $name, $description, $avatar, $attackPower,$lifeLevel,$weapon);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . CandidateDAO::CANDIDATE_TABLE . " WHERE idCreature =?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }
}
