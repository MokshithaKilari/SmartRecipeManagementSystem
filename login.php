<?php

include("db.php");

$msg="";

if(isset($_POST['login']))
{
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $result = $conn->query(
    "SELECT * FROM users
    WHERE email='$email'"
    );

    if($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();

        if(password_verify(
            $password,
            $user['password']
        ))
        {
            $_SESSION['user_id']
            = $user['user_id'];

            $_SESSION['username']
            = $user['username'];

            header("Location: dashboard.php");
            exit();
        }
        else
        {
            $msg = "Wrong Password";
        }
    }
    else
    {
        $msg = "User Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

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

.login-box{

    width:420px;

    background:
    rgba(255,255,255,0.9);

    padding:40px;

    border-radius:25px;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.3);
}

</style>

</head>

<body>

<div class="login-box">

<h2 class="text-center mb-4">

🍲 Smart Recipe Login

</h2>

<?php if($msg!=""){ ?>

<div class="alert alert-danger">

<?php echo $msg; ?>

</div>

<?php } ?>

<form method="post">

<input
class="form-control mb-3"
type="email"
name="email"
placeholder="Email"
required>

<input
class="form-control mb-3"
type="password"
name="password"
placeholder="Password"
required>

<button
class="btn btn-primary w-100"
name="login">

Login

</button>

</form>

<br>

<div class="text-center">

<a href="forgot_password.php">
Forgot Password?
</a>

<br><br>

<a href="register.php">

Create Account

</a>

</div>

</div>

</body>
</html>