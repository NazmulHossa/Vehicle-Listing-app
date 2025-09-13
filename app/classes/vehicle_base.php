<?php

abstract class VehicleBase{
   protected $name;
   protected $price;
   protected $image;
   protected $type;

   public function __construct($name, $price, $image, $type){
       $this->name = $name;
       $this->price = $price;
       $this->image = $image;
       $this->type = $type;
   }
   abstract public function getDetails();
}