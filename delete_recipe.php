<?php

include("../db.php");

$id=$_GET['id'];

$conn->query(
"DELETE FROM recipes
WHERE recipe_id='$id'"
);

header(
"Location:view_recipes.php"
);

?>