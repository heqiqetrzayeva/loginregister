<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
  <div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Login Form</h5>
                    </div>
                    <div class="card-body">
                            <?= validation_errors('<div class="alert alert-danger">','</div>'); ?>
                    <form action="<?= base_url('welcome/login'); ?>" method="post">
                        <!-- Email input -->
                         <div class="form-outline mb-4">
                         <input type="email" name="email" id="form2Example1" value="<?= set_value('email'); ?>" class="form-control" placeholder="Enter Email" />
                           <label class="form-label" for="form2Example1">Email address</label>
                       <?= form_error('email'); ?>
                        </div>

                         <!-- Password input -->
                          <div class="form-outline mb-4">
                       <input type="password" name="password" id="form2Example2" value="<?= set_value('password'); ?>" class="form-control" placeholder="Enter Password" />
                        <label class="form-label" for="form2Example2">Password</label>
                        <?= form_error('password'); ?>
                         </div>

                      <!-- Submit button -->
                       <div><input type="submit" value="Submit" /></div>

                      <!-- Register buttons -->
                       <div class="text-center">
                    <p>Not a member? <a href="<?= site_url('welcome/register'); ?>">Register</a></p>
                      </div>
                      <?php if ($this->session->flashdata('success')) { ?>
                            <div class="text-success"><?= $this->session->flashdata('success'); ?></div>
                            <?php } ?>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
</body>
</html>