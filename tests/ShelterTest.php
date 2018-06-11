<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 08.06.18
 * Time: 18:34
 */

class ShelterTest extends \PHPUnit\Framework\TestCase
{
    public function testAll()
    {
        $shelter = new \App\Shelter();

        $dog = \App\Dog::create('Шарик', 3);
        $cat = \App\Cat::create('Васька', 6);
        $turtle = \App\Turtle::create('Донателло', 10);

        $shelter->addAnimal($dog);
        $shelter->addAnimal($cat);
        $shelter->addAnimal($turtle);

        $cats = $shelter->getAnimalsByType(\App\Cat::class);
        $dogs = $shelter->getAnimalsByType(\App\Dog::class);
        $turtles = $shelter->getAnimalsByType(\App\Turtle::class);

        $this->assertEquals([0 => $dog], $dogs);
        $this->assertEquals([1 => $cat], $cats);
        $this->assertEquals([2 => $turtle], $turtles);

        $human = new \App\Human();
        $shelter->giveAnimalToHumanByType($human, \App\Dog::class);
        $shelter->giveAnimalToHuman($human);

        $turtles = $shelter->getAnimalsByTypeSortedAlphabetically(\App\Turtle::class);
        $this->assertEquals([0 => $turtle], $turtles);

        $turtles = $shelter->getAnimals();
        $this->assertEquals([0 => $turtle], $turtles);
    }
}