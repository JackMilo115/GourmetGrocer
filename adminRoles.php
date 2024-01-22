<?php
    $title = 'Admin Roles Page';
    require __DIR__ . "/inc/header.php";


    if (isset($_SESSION['user']))
    {
        if ($controllers->members()->get_role_by_id($_SESSION['user']['ID'])['role_id'] !== 2)
        {
            redirect('login', ["error" => "You need to be an admin to view this page"]);
        }
    }
    else
    {
        redirect('login', ["error" => "You need to be an admin to view this page"]);
    }
?>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <?php require __DIR__ . "/components/adminRoles.php"; ?>
            </div>
            <div class="col-6">
                <?php require __DIR__ . "/components/add-role-form.php"; ?>
            </div>
        </div>
    </div>

<?php
    require __DIR__ . "/inc/footer.php";
?>