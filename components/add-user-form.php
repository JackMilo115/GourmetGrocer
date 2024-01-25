<?php
    require_once './inc/functions.php';

    // Initialize variables
    $message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
    $firstname = null;
    $secondname = null;
    $email = null;
    $password = null;

    $roles = $controllers->roles()->get_all_roles();

    // Check if the form is submitted via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // Process the submitted form data
        $firstname = InputProcessor::processString($_POST['fname']);
        $lastname =  InputProcessor::processString($_POST['sname']);
        $email =  InputProcessor::processEmail($_POST['email']);
        $password =  InputProcessor::processPassword($_POST['password']);

        // Validate all inputs
        $valid = $firstname['valid'] && $lastname['valid'] && $email['valid'] && $password['valid'];

        // Set an error message if any input is invalid
        $message = !$valid ? "Please fix the above errors:" : '';

        // Check if the inputs are valid
        if ($valid)
        {
          // Compose the arguments into an args array
          $args = ['firstname' => $firstname['value'],
                   'lastname' => $lastname['value'],
                   'email' => $email['value'],
                   'password' => password_hash($password['value'], PASSWORD_DEFAULT),
                   'role_id' => $_POST['role']];

          // Send the args to the database
          $controllers->members()->register_member($args);
          // Redirect the user
          redirect('adminUsers');
        }
    }
?>

<!-- HTML form for registration -->
<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
  <section class="vh-100">
    <div class="container py-5 h-75">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-2">Add User</h3>
              <div class="form-outline mb-4">
                <input required type="text" id="fname" name="fname" class="form-control form-control-lg" placeholder="Firstname" value=""/>
                <small class="text-danger"><?= htmlspecialchars($firstname['error'] ?? '') ?></small>
              </div>

              <div class="form-outline mb-4">
                <input required type="text" id="sname" name="sname" class="form-control form-control-lg" placeholder="Surname" value=""/>
                <small class="text-danger"><?= htmlspecialchars($lastname['error'] ?? '') ?></small>
              </div>


              <div class="form-outline mb-4">
                <input required type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" value=""/>
                <small class="text-danger"><?= htmlspecialchars($email['error'] ?? '') ?></small>
              </div>

              <div class="form-outline mb-4">
                <input required type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" />
                <small class="text-danger"><?= htmlspecialchars($password['error'] ?? '') ?></small>
              </div>

              <div class="form-group">
                <select class="form-control" id="role" name="role">
                  <?php foreach ($roles as $role): ?> <!-- Loop through each role item -->
                        <option value="<?= htmlspecialchars($role['id']) ?>"><?= htmlspecialchars($role['name']) ?></option> 
                  <?php endforeach; ?>
                </select>
              </div>

              <button class="btn btn-primary btn-lg w-100 mb-4" type="submit" id="submit">Add</button>

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