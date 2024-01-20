<?php require __DIR__ . "/inc/header.php"; ?>
     
<?php
    if (isset($_SESSION['user']))
    {
        ?>
            <h1>Welcome <?= $_SESSION['user']['firstname'] ?? 'Member' ?>!</h1>
        <?php
    }
    else
    {
        ?>
            <h1>Welcome!</h1>
        <?php
    }
?>

<?php require __DIR__ . "/inc/footer.php"; ?>