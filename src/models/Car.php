<?php

  class Car{
    public $id;
    public $make;
    public $model;
    public $year;
    public $color;

    function __construct($id, $make, $model, $year, $color){
      $this->id = $id;
      $this->make = $make;
      $this->model = $model;
      $this->year = $year;
      $this->color = $color;
    }

  }
