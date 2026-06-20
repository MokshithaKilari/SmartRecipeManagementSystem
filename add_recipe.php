```php
<?php
include("../db.php");

$msg="";

if(isset($_POST['add']))
{
    $recipe_name=$_POST['recipe_name'];
    $ingredients=$_POST['ingredients'];
    $cooking_instructions=$_POST['cooking_instructions'];
    $category=$_POST['category'];
    $cooking_time=$_POST['cooking_time'];
    $difficulty=$_POST['difficulty'];

    $sql="INSERT INTO recipes
    (recipe_name,ingredients,cooking_instructions,category,cooking_time,difficulty_level)

    VALUES

    ('$recipe_name','$ingredients','$cooking_instructions',
    '$category','$cooking_time','$difficulty')";

    if($conn->query($sql))
    {
        $msg="Recipe Added Successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Recipe</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="
background:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),
url('https://images.unsplash.com/photo-1540420773420-3366772f4999');
background-size:cover;
background-position:center;
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
">

<div style="
width:700px;
background:white;
padding:40px;
border-radius:25px;
box-shadow:0 10px 30px rgba(0,0,0,0.3);
">

<h2 class="text-center mb-4">🥕 Add Recipe</h2>

<?php if($msg!=""){ ?>
<div class="alert alert-success">
<?php echo $msg; ?>
</div>
<?php } ?>

<form method="post">

<input
type="text"
name="recipe_name"
class="form-control mb-3"
placeholder="Recipe Name"
required>

<textarea
name="ingredients"
class="form-control mb-3"
rows="4"
placeholder="Ingredients"
required></textarea>

<textarea
name="cooking_instructions"
class="form-control mb-3"
rows="6"
placeholder="Process of Making / Cooking Instructions"
required></textarea>

<select
name="category"
class="form-control mb-3">

<option>Veg</option>
<option>Non-Veg</option>
<option>Dessert</option>

</select>

<input
type="text"
name="cooking_time"
class="form-control mb-3"
placeholder="Cooking Time (Ex: 30 mins)"
required>

<select
name="difficulty"
class="form-control mb-3">

<option>Easy</option>
<option>Medium</option>
<option>Hard</option>

</select>

<button
type="submit"
name="add"
class="btn btn-success w-100">

➕ Add Recipe

</button>

</form>

<br>

<a href="../dashboard.php"
class="btn btn-secondary w-100">

🏠 Back To Dashboard

</a>

</div>

</body>
</html>
```
