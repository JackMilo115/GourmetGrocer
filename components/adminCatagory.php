<?php
    // Include the functions file for necessary functions and classes
    require_once './inc/functions.php';

    // Retrieve all roles data using the roles controller
    $catagories = $controllers->catagories()->get_all_catagories();
?>

<!-- HTML for displaying the equipment inventory -->
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Catagories</h2> 
            <table class="table table-striped"> 
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($catagories as $catagory): ?> <!-- Loop through each roles item -->
                        <tr>
                            <!-- Display all catagories id -->
                            <td><?= htmlspecialchars($catagory['id']) ?></td> 
                            <!-- Display all catagories -->
                            <td><?= htmlspecialchars($catagory['name']) ?></td> 
                            <!-- Button to update role -->
                            <td><a href="updateCatagory.php?id=<?php echo $catagory['id']?>" class="btn btn-info" role="button">Update</a></td>
                            <!-- Button to remove role -->
                            <td><a href="removeCatagory.php?id=<?php echo $catagory['id']?>" class="btn btn-danger" role="button">Remove</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>