<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 07.06.18
 * Time: 20:07
 */

namespace App;


class Shelter
{
    /**
     * @var Animal[]
     */
    private $animals = [];

    /**
     * @return Animal[]
     */
    public function getAnimals(): array
    {
        return $this->animals;
    }

    public function getAnimalsByTypeSortedAlphabetically($type)
    {
        $animalsByType = $this->getAnimalsByType($type);

        usort($animalsByType, function (Animal $a, Animal $b) {
            return strcmp($a->getName(), $b->getName());
        });

        return $animalsByType;
    }

    public function getAnimalsByType($type)
    {
        return array_filter($this->animals, function (Animal $animal) use ($type) {
            return $animal instanceof $type;
        });
    }

    /**
     * @param Animal $animal
     */
    public function addAnimal(Animal $animal)
    {
        $this->animals[] = $animal;
    }

    /**
     * @param Human $human
     */
    public function giveAnimalToHuman(Human $human)
    {
        $animal = array_shift($this->animals);
        $human->addAnimal($animal);
    }

    /**
     * @param Human $human
     * @param $type
     * @throws \Exception
     */
    public function giveAnimalToHumanByType(Human $human, $type)
    {
        $animalsByType = $this->getAnimalsByType($type);

        if (empty($animalsByType)) {
            throw new \Exception('Animal not found');
        }

        $animalByType = reset($animalsByType);

        $key = key($animalsByType);

        unset($this->animals[$key]);

        $this->animals = array_values($this->animals);

        $human->addAnimal($animalByType);
    }
}