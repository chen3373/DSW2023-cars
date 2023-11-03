<?php

namespace Chen\Cars\Models;

class Car
{
  // private static $cars = [];

  public $id;
  public $make;
  public $model;
  public $year;
  public $color;

  private static $dataFile = '../data/cars.json';

  function __construct($id, $make, $model, $year, $color)
  {
    $this->id = $id;
    $this->make = $make;
    $this->model = $model;
    $this->year = $year;
    $this->color = $color;
  }

  public static function getAll()
  {

    $cars = [];
    $json = file_get_contents(self::$dataFile);
    $carsJson = json_decode($json);
    foreach ($carsJson as $carJson) {
      $cars[] = new Car($carJson->id, $carJson->make, $carJson->model, $carJson->year, $carJson->color);
    }
    return $cars;


    // $cars[] = new Car("4563", "Toyota", "Corolla", 1998, "green");
    // $cars[] = new Car("3453", "Nissan", "Nismo", 2021, "yellow");
    // $cars[] = new Car("2933", "Seat", "Ibiza", 2015, "red");
    //return $cars;
  }

  public static function find($id)
  {
    //FORMA ADEXE
    foreach (self::getAll() as $car) {
      if ($car->id == $id) {
        return $car;
      }
    }


    //FORMA PROFE
    // $carsFilter = array_filter(self::getAll(), fn ($car) => $car->id == $id);
    // if(sizeof($carsFilter) > 0){
    //   return array_pop($carsFilter);
    // }
    // return null;
  }

  public static function delete($id)
  {
    echo "Borrando el coche con el id=$id";
    $cars = [];
    foreach (self::getAll() as $car) {
      if ($car->id != $id) {
        $cars[] = $car;
      }
    }
    self::save($cars);
  }

  public static function create($car)
  {
    $cars = self::getAll();
    $cars[] = $car;
    self::save($cars);
  }

  private static function save($data)
  {
    // Convert JSON data from an array
    $jsonString = json_encode($data, JSON_PRETTY_PRINT);
    // Write in the file
    $file = fopen(self::$dataFile, 'w');
    fwrite($file, $jsonString);
    fclose($file);
  }
}
