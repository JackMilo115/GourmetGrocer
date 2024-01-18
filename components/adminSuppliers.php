<?php
    // Include the functions file for necessary functions and classes
    require_once './inc/functions.php';

    // Retrieve all roles data using the roles controller
    $suppliers = $controllers->suppliers()->get_all_suppliers();
?>

<!-- HTML for displaying the equipment inventory -->
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Suppliers</h2> 
            <table class="table table-striped"> 
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suppliers as $supplier): ?> <!-- Loop through each roles item -->
                        <tr>
                            <!-- Display all roles id -->
                            <td><?= htmlspecialchars($supplier['id']) ?></td> 
                            <!-- Display all roles -->
                            <td><?= htmlspecialchars($supplier['name']) ?></td> 
                            <!-- Display all roles -->
                            <td><?= htmlspecialchars($supplier['email']) ?></td> 
                            <!-- Button to update role -->
                            <td><a href="updateSupplier.php?id=<?php echo $supplier['id']?>" class="btn btn-info" role="button">Update</a></td>
                            <!-- Button to remove role -->
                            <td><a href="removeSupplier.php?id=<?php echo $supplier['id']?>" class="btn btn-danger" role="button">Remove</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>