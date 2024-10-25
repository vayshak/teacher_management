<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>

  
   <?php $this->load->view('css.php'); ?>
  
</head>
<body>
    <div class="container">
        <h2>Teacher Login</h2>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="error"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <form action="<?= base_url('auth/login_user'); ?>" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="<?= base_url('auth/signup'); ?>">Sign up</a></p>
        </form>
    </div>
</body>
</html>
