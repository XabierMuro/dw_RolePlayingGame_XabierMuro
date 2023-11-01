<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Creature
 *
 * @author xabie
 */
class Creature {
    
    private $idCreature;
    private $name;
    private $decription;
    private $avatar;
    private $attackPower;
    private $lifeLevel;
    private $weapon;
    
    public function __construct($idCreature, $name, $decription, $avatar, $attackPower, $lifeLevel, $weapon) {
        $this->idCreature = $idCreature;
        $this->name = $name;
        $this->decription = $decription;
        $this->avatar = $avatar;
        $this->attackPower = $attackPower;
        $this->lifeLevel = $lifeLevel;
        $this->weapon = $weapon;
    }
    public function getIdCreature() {
        return $this->idCreature;
    }

    public function getName() {
        return $this->name;
    }

    public function getDecription() {
        return $this->decription;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getAttackPower() {
        return $this->attackPower;
    }

    public function getLifeLevel() {
        return $this->lifeLevel;
    }

    public function getWeapon() {
        return $this->weapon;
    }

    public function setIdCreature($idCreature): void {
        $this->idCreature = $idCreature;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setDecription($decription): void {
        $this->decription = $decription;
    }

    public function setAvatar($avatar): void {
        $this->avatar = $avatar;
    }

    public function setAttackPower($attackPower): void {
        $this->attackPower = $attackPower;
    }

    public function setLifeLevel($lifeLevel): void {
        $this->lifeLevel = $lifeLevel;
    }

    public function setWeapon($weapon): void {
        $this->weapon = $weapon;
    }


    
    
    
    
    
    
    
}
