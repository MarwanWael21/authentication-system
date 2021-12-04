<?php
session_start();
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="border shadow p-3 rounded" style="width: 450px;" class="border shadow p-3 rounded" style="width: 450px;" method="POST" action="#" enctype="multipart/form-data">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <h1 class="text-center p-3">Sign up</h1>
            <div class="alert alert-danger text-center" style="display: none;" role="alert">
            </div>
            <div class="mb-3">
                <label for="nickname" class="form-label">Profile Name</label>
                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="nickname">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
            <button type="submit" class="btn btn-primary form-control" name="submit" onclick="formSubmit('php/check_user.php', 'home.php')">Submit</button>
        </form>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
