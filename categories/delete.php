<?php
include '../config/config.php';

$id = $_GET['id'];

$sql = "DELETE FROM categories WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
