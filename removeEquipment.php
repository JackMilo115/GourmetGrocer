<?php
    require_once 'inc/functions.php';

    if (isset($_SESSION['user']))
    {
        if ($controllers->members()->get_role_by_id($_SESSION['user']['id'])['role_id'] !== 2)
        {
            redirect('login', ["error" => "You need to be an admin to view this page"]);
        }
    }
    
    $controllers->equipment()->delete_equipment($_GET['id']);

    redirect('AdminPortal');
?>