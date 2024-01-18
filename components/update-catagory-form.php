<?php
    require_once './inc/functions.php';

    // Initialize variables
    $message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
    $name = null;

    // Check if the form is submitted via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // Process the submitted form data
        $name = InputProcessor::processString($_POST['name']);

        // Validate all inputs
        $valid = $name['valid'];

        // Set an error message if any input is invalid
        $message = !$valid ? "Please fix the above errors:" : '';

        // Check if the inputs are valid
        if ($valid)
        {
          // Compose the arguments into an args array
          $args = ['name' => $name['value'],
                   'id' => $_POST['id']];

          // Send the args to the database
          $controllers->catagories()->update_catagory($args);
          // Redirect the user
          redirect('adminCatagory');
        }
    }

    // Check that the id has been passed in
    if (isset($_GET['id']))
    {
      // Get data by passed id
      $catagory = $controllers->catagories()->get_catagory_by_id($_GET['id']);
    }
?>

<!-- HTML form for registration -->
<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?id=<?php echo $catagory['id']?>">
  <section class="vh-100">
    <div class="container py-5 h-75">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-2">Update Catagory</h3>
              <div class="form-outline mb-4">
                <input required type="text" id="name" name="name" class="form-control form-control-lg" placeholder="name" value="<?= htmlspecialchars($catagory['name'] ?? '') ?>"/>
                <small class="text-danger"><?= htmlspecialchars($name['error'] ?? '') ?></small>
              </div>

              <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($catagory['id'] ?? '') ?>">

              <button class="btn btn-primary btn-lg w-100 mb-4" type="submit">Update</button>

              <?php if ($message): ?>
                <div class="alert alert-danger mt-4">
                  <?= $message ?? '' ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>