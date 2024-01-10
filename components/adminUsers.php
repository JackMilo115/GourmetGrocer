<?php
    // Include the functions file for necessary functions and classes
    require_once './inc/functions.php';

    // Retrieve all roles data using the roles controller
    $members = $controllers->members()->get_all_members();
?>

<!-- HTML for displaying the equipment inventory -->
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
                <td><a href="removeUser.php?id=<?php echo $member['ID']?>" class="btn btn-info" role="button">Remove</a></td>
                <!-- Button to update user -->
                <td><a href="updateUser.php?id=<?php echo $member['ID']?>" class="btn btn-info" role="button">Update</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>