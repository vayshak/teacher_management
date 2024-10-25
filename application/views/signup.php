<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Signup</title>
    <?php $this->load->view('css.php'); ?>
</head>
<body>
    <div class="container">
        <h2>Teacher Signup</h2>
        <form action="<?= base_url('auth/register'); ?>" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Sign Up</button>
            <p>Already have an account? <a href="<?=base_url('auth/login'); ?>">Login</a></p>
        </form>
    </div>
</body>
</html>
