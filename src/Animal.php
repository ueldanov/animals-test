<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 07.06.18
 * Time: 14:07
 */

namespace App;


class Animal
{
    private $name;
    private $age;

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param mixed $name
     * @throws \Exception
     */
    public function setName($name): void
    {
        if (!is_null($this->name)) {
            throw new \Exception();
        }
        $this->name = $name;
    }

    /**
     * @param mixed $age
     * @throws \Exception
     */
    public function setAge($age): void
    {
        if (!is_null($this->age)) {
            throw new \Exception();
        }
        $this->age = $age;
    }

    public static function create($name, $age)
    {
        $animal = new static();

        $animal->name = $name;
        $animal->age = $age;

        return $animal;
    }
}