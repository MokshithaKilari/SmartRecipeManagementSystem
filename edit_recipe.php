```php
<?php
include("../db.php");

$id=$_GET['id'];

$result=$conn->query(
"SELECT * FROM recipes
WHERE recipe_id='$id'"
);

$row=$result->fetch_assoc();

if(isset($_POST['update']))
{
    $recipe_name=$_POST['recipe_name'];
    $ingredients=$_POST['ingredients'];
    $cooking_instructions=$_POST['cooking_instructions'];
    $category=$_POST['category'];
    $cooking_time=$_POST['cooking_time'];
    $difficulty=$_POST['difficulty'];

    $conn->query(
    "UPDATE recipes SET

    recipe_name='$recipe_name',
    ingredients='$ingredients',
    cooking_instructions='$cooking_instructions',
    category='$category',
    cooking_time='$cooking_time',
    difficulty_level='$difficulty'

    WHERE recipe_id='$id'"
    );

    header("Location:view_recipes.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Recipe</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="mb-4">✏ Edit Recipe</h2>

<form method="post">

<input
class="form-control mb-3"
type="text"
name="recipe_name"
value="<?php echo $row['recipe_name']; ?>">

<textarea
class="form-control mb-3"
name="ingredients"
rows="4"><?php echo $row['ingredients']; ?></textarea>

<textarea
class="form-control mb-3"
name="cooking_instructions"
rows="6"><?php echo $row['cooking_instructions']; ?></textarea>

<select
name="category"
class="form-control mb-3">

<option <?php if($row['category']=="Veg") echo "selected"; ?>>Veg</option>
<option <?php if($row['category']=="Non-Veg") echo "selected"; ?>>Non-Veg</option>
<option <?php if($row['category']=="Dessert") echo "selected"; ?>>Dessert</option>

</select>

<input
class="form-control mb-3"
type="text"
name="cooking_time"
value="<?php echo $row['cooking_time']; ?>">

<select
name="difficulty"
class="form-control mb-3">

<option <?php if($row['difficulty_level']=="Easy") echo "selected"; ?>>Easy</option>
<option <?php if($row['difficulty_level']=="Medium") echo "selected"; ?>>Medium</option>
<option <?php if($row['difficulty_level']=="Hard") echo "selected"; ?>>Hard</option>

</select>

<button
class="btn btn-success"
name="update">

Update Recipe

</button>

<a href="view_recipes.php"
class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</div>

</body>
</html>
```
