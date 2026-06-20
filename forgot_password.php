<?php
include("db.php");

$msg = "";

if(isset($_POST['reset']))
{
    $email = $_POST['email'];
    $newpassword = password_hash(
        $_POST['newpassword'],
        PASSWORD_DEFAULT
    );

    $check = $conn->query(
    "SELECT * FROM users
    WHERE email='$email'"
    );

    if($check->num_rows > 0)
    {
        $conn->query(
        "UPDATE users
        SET password='$newpassword'
        WHERE email='$email'"
        );

        $msg = "
        <div class='alert alert-success'>
        Password Updated Successfully!
        <br>
        <a href='login.php'>
        Login Now
        </a>
        </div>";
    }
    else
    {
        $msg = "
        <div class='alert alert-danger'>
        Email Not Found
        </div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Forgot Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{

    min-height:100vh;

    background:
    linear-gradient(
    rgba(0,0,0,0.5),
    rgba(0,0,0,0.5)
    ),

    url('https://images.unsplash.com/photo-1556911220-bff31c812dba');

    background-size:cover;
    background-position:center;

    display:flex;
    justify-content:center;
    align-items:center;
}

.reset-card{

    width:450px;

    background:white;

    padding:40px;

    border-radius:25px;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.3);
}

</style>

</head>

<body>

<div class="reset-card">

<h2 class="text-center mb-4">
🔐 Reset Password
</h2>

<?php echo $msg; ?>

<form method="post">

<input
class="form-control mb-3"
type="email"
name="email"
placeholder="Enter Registered Email"
required>

<input
class="form-control mb-3"
type="password"
name="newpassword"
placeholder="Enter New Password"
required>

<button
class="btn btn-warning w-100"
name="reset">

Reset Password

</button>

</form>

<br>

<div class="text-center">

<a href="login.php">

Back to Login

</a>

</div>

</div>

</body>
</html>