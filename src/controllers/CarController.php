<?php

class CarController
{
  private $cars = [];
  public function __construct()
  {
    $this->cars[] = new Car("4563", "Toyota", "Corolla", 1998, "green");
    $this->cars[] = new Car("3453", "Nissan", "Nismo", 2021, "yellow");
    $this->cars[] = new Car("2933", "Seat", "Ibiza", 2015, "red");
  }
  public function list()
  {
    // return all cars
    $listCars = $this->cars;
    require '../src/views/list.php';
  }

  public function show($id)
  {
    // return the car witch this id
    $cars = array_filter($this->cars, fn ($car) => $car->id == $id);
    if (sizeof($cars) > 0) {
      $car = array_pop($cars);
      require '../src/views/show.php';
    } else {
      echo "Car not found!";
    }
  }
}
