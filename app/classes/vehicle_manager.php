<?php 
require_once __DIR__ . '/file_handler.php';
require_once __DIR__ . '/vehicle_action.php';
require_once __DIR__ . '/vehicle_base.php';

class VehicleManager extends VehicleBase implements VehicleActions {
use FileHandler;

public function addVehicle($data)
{
    $vehicle = $this->readFile();
    $vehicle[]= $data;
    $this->writeFile($vehicle);
}
  

public function editVehicle($id, $data)
{
    $vehicle=$this->readFile();
    if(isset($vehicle[$id]))
    {
        $vehicle[$id] = $data;
        $this->writeFile($vehicle);
    }

}

public function deleteVehicle($id)
{
    $vehicle=$this->readFile();
    if(isset($vehicle[$id]))
    {
       unset($vehicle[$id]);
        $this->writeFile(array_values($vehicle));
    }
}


public function getVehicle()
{
    return $this->readFile();
}

public function getDetails()
{
    return [
        'name' => $this->name,
        'type' => $this->type,
        'price' => $this->price,
        'image' => $this->image
    ];
}

}