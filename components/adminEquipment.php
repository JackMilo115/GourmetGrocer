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
                            <!-- Button to remove equipment -->
                            <td><a href="functions/removeEquipment.php?id=<?php echo $equipment['id']?>" class="btn btn-info" role="button">Remove</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>