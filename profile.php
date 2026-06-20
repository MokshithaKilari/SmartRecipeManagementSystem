<?php
include("db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = $conn->query($sql);

$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>👤 My Profile</h3>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th>User ID</th>
                    <td><?php echo $user['user_id']; ?></td>
                </tr>

                <tr>
                    <th>Username</th>
                    <td><?php echo $user['username']; ?></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><?php echo $user['email']; ?></td>
                </tr>

                <tr>
                    <th>Account Created</th>
                    <td><?php echo $user['created_at']; ?></td>
                </tr>

            </table>

            <a href="dashboard.php" class="btn btn-success">
                Back to Dashboard
            </a>

            <a href="logout.php" class="btn btn-danger">
                Logout
            </a>

        </div>

    </div>

</div>

</body>
</html>