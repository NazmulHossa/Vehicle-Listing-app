<?php

interface VehicleActions{
   public function addVehicle($vehicle);
   public function editVehicle($id, $data);
    public function deleteVehicle($id);
    public function getVehicle();

}