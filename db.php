```php
<?php

session_start();

$host = "your_host";
$user = "your_username";
$pass = "your_password";
$db = "your_database";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error)
{
    die("Connection Failed: " . $conn->connect_error);
}

?>
```
