<?php
    $title = 'Member Page';
    require __DIR__ . "/inc/header.php"; 
    require_once 'inc/functions.php';

    if (!isset($_SESSION['user']))
    {
        redirect('login', ["error" => "You need to be logged in to view this page"]);
    }
?>

<h1>Welcome <?= $_SESSION['user']['firstname'] ?? 'Member' ?>!</h1>

<?php
    print_r($_SESSION['user']);
    print_r($controllers->members()->get_role_by_id($_SESSION['user']['id']));
?>

<?php require __DIR__ . "/inc/footer.php"; ?>