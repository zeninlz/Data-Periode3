<?php
include "ìnfo-methode-producten.php"; 


$producten = new Producten($myDb);

try {
    if (isset($_GET['id'])) {
        $producten->deleteProducten($_GET['id']);
        header("Location: overzicht-producten.php");
    } else {
        echo "Error: ID parameter is not set.";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>

