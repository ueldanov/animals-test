<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 07.06.18
 * Time: 20:11
 */

namespace App;


class Human
{
    private $name;
    private $age;
    private $animals;

    public function addAnimal(Animal $animal)
    {
        $this->animals[] = $animal;
    }
}