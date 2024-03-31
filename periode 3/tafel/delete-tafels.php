<?php
include "ìnfo-methode-tafel.php"; 

$tafels = new tafels($myDb); 

try {
    if (isset($_GET['id'])) {
        $tafels->deleteTafels($_GET['id']);
        header("Location: overzicht-tafel.php");
    } else {
        echo "Error: ID parameter is not set.";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>

