<?php
    // Include the functions file for necessary functions and classes
    require_once './inc/functions.php';

    // Retrieve all roles data using the roles controller
    $roles = $controllers->roles()->get_all_roles();
    $members = $controllers->members()->get_all_members();
    $equipments = $controllers->equipment()->get_all_equipments();
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $role): ?> <!-- Loop through each roles item -->
                        <tr>
                            <!-- Display all roles id -->
                            <td><?= htmlspecialchars($role['id']) ?></td> 
                            <!-- Display all roles -->
                            <td><?= htmlspecialchars($role['name']) ?></td> 
                            <!-- Button to remove role -->
                            <td><a href="functions/removeRole.php?id=<?php echo $role['id']?>" class="btn btn-info" role="button">Remove</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col">
            <h2>Users</h2> 
            <table class="table table-striped"> 
                    <tr>
                        <th>ID</th> 
                        <th>First Name</th>
                        <th>Second Name</th>
                        <th>Email</th> 
                        <th>Role</th>
                        <th></th>
                        <th></th> 
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $member): ?> <!-- Loop through each member item -->
                        <tr>
                            <!-- Display all member ids -->
                            <td><?= htmlspecialchars($member['ID']) ?></td> 
                            <!-- Display all member firstnames -->
                            <td><?= htmlspecialchars($member['firstname']) ?></td> 
                            <!-- Display all member lastnames -->
                            <td><?= htmlspecialchars($member['lastname']) ?></td> 
                            <!-- Display all member emails -->
                            <td><?= htmlspecialchars($member['email']) ?></td> 
                            <!-- Display all member roles -->
                            <td><?= htmlspecialchars($controllers->roles()->get_rolename_by_id($member['role_id'])['name']) ?></td>
                            <!-- Button to remove user -->
                            <td><a href="functions/removeUser.php?id=<?php echo $member['ID']?>" class="btn btn-info" role="button">Remove</a></td>
                            <!-- Button to update user -->
                            <td><a href="functions/updateUser.php?id=<?php echo $member['ID']?>" class="btn btn-info" role="button">Update</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col">
            <h2>Equipment</h2> 
            <table class="table table-striped"> 
                    <tr>
                        <th>ID</th> 
                        <th>Name</th>
                        <th>Description</th>
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