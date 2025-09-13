<?php
require_once'./../app/classes/vehicle_manager.php';
$vehicleManager = new VehicleManager('', '', '', '');

$vehicles = $vehicleManager->getVehicle();

include "./../public/view/header.php";
?>
<div class="container mp-4">
<h1>Vehicle Listing</h1>
<a href="./../public/view/add.php" class="button button-primary mb-2">Add Vehicle</a>
</div>


<?php foreach($vehicles as $id => $vehicle): ?>
    <div class="col-md-4">
        <div class="card">
            <img src="<?= htmlspecialchars($vehicle['image']) ?>" 
                 class="card-img-top" 
                 style="height: 200px; object-fit: cover;" 
                 alt="Vehicle Image">

            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($vehicle['name']) ?></h5>
                <p class="card-text">Type: <?= htmlspecialchars($vehicle['type']) ?></p>
                <p class="card-text">Price: <?= htmlspecialchars($vehicle['price']) ?> BDT</p>

                <a href="./view/edit.php?id=<?= $id ?>" class="btn btn-primary">Edit</a>
                <a href="./../public/view/delete.php?id=<?= $id ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
