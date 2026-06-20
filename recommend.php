```php
<?php
include("../db.php");

$result = null;

if(isset($_POST['search']))
{
    $category = $_POST['category'];

    $result = $conn->query(
    "SELECT * FROM recipes
    WHERE category='$category'"
    );
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Recipe Recommendations</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:
linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),
url('https://images.unsplash.com/photo-1490645935967-10de6ba17061');

background-size:cover;
background-position:center;
background-attachment:fixed;
min-height:100vh;
}

.card-box{
background:white;
padding:30px;
border-radius:20px;
box-shadow:0px 10px 25px rgba(0,0,0,0.3);
}

.recipe-card{
background:white;
padding:20px;
border-radius:15px;
margin-bottom:20px;
box-shadow:0px 5px 15px rgba(0,0,0,0.2);
}

</style>

</head>

<body>

<div class="container py-5">

<h1 class="text-center text-white mb-4">
🍽 Recipe Recommendations
</h1>

<div class="card-box">

<form method="post">

<label class="fw-bold mb-2">
Select Food Category
</label>

<select
name="category"
class="form-control mb-3"
required>

<option value="">Choose Category</option>
<option value="Veg">🥗 Veg</option>
<option value="Non-Veg">🍗 Non-Veg</option>
<option value="Dessert">🍰 Dessert</option>

</select>

<button
type="submit"
name="search"
class="btn btn-success">

Show Recipes

</button>

</form>

</div>

<?php
if($result && $result->num_rows > 0)
{
?>

<div class="row mt-4">

<?php
while($row=$result->fetch_assoc())
{
?>

<div class="col-md-4">

<div class="recipe-card">

<h4>
<?php echo $row['recipe_name']; ?>
</h4>

<hr>

<p>
<b>Ingredients:</b><br>
<?php echo $row['ingredients']; ?>
</p>

<p>
<b>Process:</b><br>
<?php echo $row['cooking_instructions']; ?>
</p>

<p>
<b>Cooking Time:</b>
<?php echo $row['cooking_time']; ?>
</p>

<p>
<b>Difficulty:</b>
<?php echo $row['difficulty_level']; ?>
</p>

</div>

</div>

<?php
}
?>

</div>

<?php
}
elseif(isset($_POST['search']))
{
?>

<div class="alert alert-warning mt-4">
No recipes found in this category.
</div>

<?php
}
?>

<div class="text-center mt-4">

<a href="../dashboard.php"
class="btn btn-light">

🏠 Back To Dashboard

</a>

</div>

</div>

</body>
</html>
```
