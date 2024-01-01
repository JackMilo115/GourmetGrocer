<?php
    // Include the functions file for necessary functions and classes
    require_once './inc/functions.php';

    // Retrieve all roles data using the roles controller
    $roles = $controllers->roles()->get_all_roles();
?>

<!-- HTML for displaying the equipment inventory -->
<div class="container mt-4">
    <h2>Roles</h2> 
    <table class="table table-striped"> 
            <tr>
                <th>Name</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?> <!-- Loop through each roles item -->
                <tr>
                    <!-- Display all roles -->
                    <td><?= htmlspecialchars($role['name']) ?></td> 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
