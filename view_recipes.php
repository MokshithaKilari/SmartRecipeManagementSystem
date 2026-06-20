```php
<?php
include("../db.php");

$result = $conn->query("SELECT * FROM recipes");
?>

<!DOCTYPE html>
<html>
<head>

<title>Recipe Gallery</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0');
background-size:cover;
background-position:center;
background-attachment:fixed;
min-height:100vh;
}

.recipe-card{
background:white;
border-radius:20px;
padding:20px;
box-shadow:0 8px 20px rgba(0,0,0,0.2);
height:100%;
}

.page-title{
color:white;
text-align:center;
margin-bottom:40px;
}

</style>

</head>

<body>

<div class="container py-5">

<h1 class="page-title">🍽 Recipe Gallery</h1>

<div class="row">

<?php
while($row=$result->fetch_assoc())
{
?>

<div class="col-md-4 mb-4">

<div class="recipe-card">

<h4>🍲 <?php echo $row['recipe_name']; ?></h4>

<hr>

<p>
<b>Ingredients:</b><br>
<?php echo $row['ingredients']; ?>
</p>

<p>
<b>Process of Making:</b><br>
<?php echo $row['cooking_instructions']; ?>
</p>

<p>
<b>Category:</b>
<?php echo $row['category']; ?>
</p>

<p>
<b>Cooking Time:</b>
<?php echo $row['cooking_time']; ?>
</p>

<p>
<b>Difficulty:</b>
<?php echo $row['difficulty_level']; ?>
</p>

<a
href="edit_recipe.php?id=<?php echo $row['recipe_id']; ?>"
class="btn btn-warning">

Edit

</a>

<a
href="delete_recipe.php?id=<?php echo $row['recipe_id']; ?>"
class="btn btn-danger">

Delete

</a>

</div>

</div>

<?php
}
?>

</div>

<div class="text-center mt-4">

<a href="../dashboard.php"
class="btn btn-light btn-lg">

🏠 Back To Dashboard

</a>

</div>

</div>

</body>
</html>
```
