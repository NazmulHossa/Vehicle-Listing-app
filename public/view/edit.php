<?php
require_once "../../app/classes/vehicle_manager.php";
$vehicleManager = new VehicleManager('', '', '', '');

// 1. Get ID
$id = $_GET['id'] ?? null;
if ($id === null || $id === '') {
    header("Location: ../index.php");
    exit;
}

// 2. Get Vehicle
$vehicles = $vehicleManager->getVehicle();
$vehicle = $vehicles[$id] ?? null;

if (!$vehicle) {
    header("Location: ../index.php");
    exit;
}

// 3. Handle form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = [
        'name'  => $_POST['name'],
        'type'  => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ];

    $vehicleManager->editVehicle($id, $updatedData);
    header("Location: ../index.php");
    exit;
}

include "./header.php";
?>

<div class="container my-4">
    <h1>Edit Vehicle</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Vehicle Name</label>
            <input type="text" name="name" class="form-control"
                   value="<?= htmlspecialchars($vehicle['name']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Vehicle Type</label>
            <input type="text" name="type" class="form-control"
                   value="<?= htmlspecialchars($vehicle['type']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Vehicle Price</label>
            <input type="number" name="price" class="form-control"
                   value="<?= htmlspecialchars($vehicle['price']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control"
                   value="<?= htmlspecialchars($vehicle['image']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Vehicle</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>  
    </form>
</div>
