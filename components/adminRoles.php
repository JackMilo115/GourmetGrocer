<?php
    // Include the functions file for necessary functions and classes
    require_once './inc/functions.php';

    // Retrieve all roles data using the roles controller
    $roles = $controllers->roles()->get_all_roles();
?>

<!-- HTML for displaying the equipment inventory -->
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Roles</h2> 
            <table class="table table-striped"> 
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $role): ?> <!-- Loop through each roles item -->
                        <tr>
                            <!-- Display all roles id -->
                            <td><?= htmlspecialchars($role['id']) ?></td> 
                            <!-- Display all roles -->
                            <td><?= htmlspecialchars($role['name']) ?></td> 
                            <!-- Button to update role -->
                            <td><a href="updateRole.php?id=<?php echo $role['id']?>" class="btn btn-info" role="button">Update</a></td>
                            <!-- Button to remove role -->
                            <td><a href="removeRole.php?id=<?php echo $role['id']?>" class="btn btn-danger" role="button">Remove</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>