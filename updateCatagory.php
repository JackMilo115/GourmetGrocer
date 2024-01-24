<?php
    $title = 'Admin Update Catagory Page';
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
        //redirect('login', ["error" => "You need to be an admin to view this page"]);
    }

    require __DIR__ . "/components/update-catagory-form.php";

    require __DIR__ . "/inc/footer.php";
?>