<?php
include("db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$userid = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>

    <title>Dashboard | Smart Recipe System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>

        body{
            background: linear-gradient(to right,#f8f9fa,#e3f2fd);
            min-height:100vh;
        }

        .navbar{
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        .welcome-card{
            background:white;
            border-radius:20px;
            padding:30px;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
            margin-top:30px;
        }

        .menu-card{
            border:none;
            border-radius:20px;
            transition:0.3s;
            box-shadow:0 4px 15px rgba(0,0,0,0.08);
        }

        .menu-card:hover{
            transform:translateY(-5px);
        }

        .icon{
            font-size:50px;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand fw-bold" href="#">
            🍲 Smart Recipe System
        </a>

        <a href="logout.php" class="btn btn-light">
            Logout
        </a>

    </div>

</nav>

<div class="container">

    <div class="welcome-card">

        <h2>
            👋 Welcome,
            <?php echo htmlspecialchars($username); ?>
        </h2>

        <p class="text-muted">
            User ID:
            <strong><?php echo $userid; ?></strong>
        </p>

        <p>
            Manage your recipes, explore recommendations,
            and maintain your food preferences.
        </p>

    </div>

    <div class="row mt-4">

        <div class="col-md-3 mb-4">

            <div class="card menu-card text-center p-4">

                <div class="icon">
                    ➕
                </div>

                <h5>Add Recipe</h5>

                <a href="recipes/add_recipe.php"
                class="btn btn-success mt-2">

                    Open

                </a>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card menu-card text-center p-4">

                <div class="icon">
                    📖
                </div>

                <h5>View Recipes</h5>

                <a href="recipes/view_recipes.php"
                class="btn btn-info mt-2">

                    Open

                </a>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card menu-card text-center p-4">

                <div class="icon">
                    ⭐
                </div>

                <h5>Recommendations</h5>

                <a href="recommendations/recommend.php"
                class="btn btn-warning mt-2">

                    Open

                </a>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card menu-card text-center p-4">

                <div class="icon">
                    👤
                </div>

                <h5>My Profile</h5>

                <a href="profile.php"
                class="btn btn-secondary mt-2">

                    Open

                </a>

            </div>

        </div>

    </div>

    <div class="card mt-4 border-0 shadow">

        <div class="card-body">

            <h4>📌 Quick Tips</h4>

            <ul>
                <li>Add recipes with ingredients and cooking time.</li>
                <li>Update your food preferences for better recommendations.</li>
                <li>Use ratings to improve recommendation accuracy.</li>
                <li>Manage all recipes from the View Recipes section.</li>
            </ul>

        </div>

    </div>

</div>

</body>
</html>