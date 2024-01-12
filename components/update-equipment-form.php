<?php
    require_once './inc/functions.php';

    // Initialize variables
    $message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
    $name = null;
    $description = null;
    $image = null;

    // Check if the form is submitted via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // Process the submitted form data
        $name = InputProcessor::processString($_POST['name']);
        $description =  InputProcessor::processString($_POST['description']);
        $image =  InputProcessor::processString($_POST['image']);

        // Validate all inputs
        $valid = $name['valid'] && $description['valid'] && $image['valid'];

        // Set an error message if any input is invalid
        $message = !$valid ? "Please fix the above errors:" : '';

        // Check if the inputs are valid
        if ($valid)
        {
          // Compose the arguments into an args array
          $args = ['name' => $name['value'],
                   'description' => $description['value'],
                   'image' => $image['value'],
                   'id' => $_POST['id']];

          // Send the args to the database
          $controllers->equipment()->update_equipment($args);
          // Redirect the user
          redirect('adminEquipment');
        }
    }

    // Check that the id has been passed in
    if (isset($_GET['id']))
    {
      // Get data by passed id
      $equipment = $controllers->equipment()->get_equipment_by_id($_GET['id']);
    }
?>

<!-- HTML form for registration -->
<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?id=<?php echo $user['ID']?>">
  <section class="vh-100">
    <div class="container py-5 h-75">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-2">Update Equipment</h3>
              <div class="form-outline mb-4">
                <input required type="text" id="name" name="name" class="form-control form-control-lg" placeholder="name" value="<?= htmlspecialchars($equipment['name'] ?? '') ?>"/>
                <small class="text-danger"><?= htmlspecialchars($name['error'] ?? '') ?></small>
              </div>

              <div class="form-outline mb-4">
                <input required type="text" id="description" name="description" class="form-control form-control-lg" placeholder="description" value="<?= htmlspecialchars($equipment['description'] ?? '') ?>"/>
                <small class="text-danger"><?= htmlspecialchars($description['error'] ?? '') ?></small>
              </div>


              <div class="form-outline mb-4">
                <input required type="text" id="image" name="image" class="form-control form-control-lg" placeholder="image" value="<?= htmlspecialchars($equipment['image']?? '') ?>" />
                <small class="text-danger"><?= htmlspecialchars($email['error'] ?? '') ?></small>
              </div>

              <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($user['ID'] ?? '') ?>">

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