<?php
include "ìnfo-methode-klanten.php"; 


$klanten = new klanten($myDb);

try {
    if (isset($_GET['id'])) {
        $klanten->deleteklanten($_GET['id']);
        header("Location: overzicht-klanten.php");
    } else {
        echo "Error: ID parameter is not set.";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>

