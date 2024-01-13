<?php
    // Include the functions file for necessary functions and classes
    require_once './inc/functions.php';

    // Retrieve all roles data using the roles controller
    $equipments = $controllers->equipment()->get_all_equipments();
?>


<!-- HTML for displaying the equipment inventory -->
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Equipment</h2> 
            <table class="table table-striped"> 
                    <tr>
                        <th>ID</th> 
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($equipments as $equipment): ?> <!-- Loop through each member item -->
                        <tr>
                            <!-- Display all member ids -->
                            <td><?= htmlspecialchars($equipment['id']) ?></td> 
                            <!-- Display all member firstnames -->
                            <td><?= htmlspecialchars($equipment['name']) ?></td> 
                            <!-- Display all member lastnames -->
                            <td><?= htmlspecialchars($equipment['description']) ?></td>
                            <!-- Display all member lastnames -->
                            <td><img src="<?= htmlspecialchars($equipment['image']) ?>"
                             alt="Image of <?= htmlspecialchars($equipment['description']) ?>" 
                             style="width: 100px; height: auto;"></td>
                            <!-- Button to update equipment -->
                            <td><a href="updateEquipment.php?id=<?php echo $equipment['id']?>" class="btn btn-info" role="button">Update</a></td>
                            <!-- Button to remove equipment -->
                            <td><a href="removeEquipment.php?id=<?php echo $equipment['id']?>" class="btn btn-danger" role="button">Remove</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>