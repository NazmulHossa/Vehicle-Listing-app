<?php
require_once"../../app/classes/vehicle_manager.php";
$vehicleManager = new VehicleManager('', '', '','');

$id =$_GET['id'] ?? '';

if($id===null){
    header("Location:../index.php");
    exit;
}
$vehicles = $vehicleManager->getVehicle();
$vehicle=$vehicles[$id] ?? null;
if($vehicle){
     header("Location:../index.php");
      exit;
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['confirm']) && $_POST['confirm']==='yes');
    $vehicleManager->deleteVehicle($id);
}
include "./header.php";
?>
<div class="container my-4">
    <h1>Delete Vehicle</h1>
    <p>Are you sure you want to delete this vehicle?</p>
    <form method="POST">
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>