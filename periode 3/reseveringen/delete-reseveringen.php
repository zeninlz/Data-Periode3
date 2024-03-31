<?php 
include "info-methode-reseveringen.php";

$reseveringen = new reseveringen($myDb);

try {
    if (isset($_GET['reseveringCode'])) {
        $reseveringen->deleteReservering($_GET['reseveringCode']);
        header("Location: reseveringen-overzicht.php");
    } else {
        echo "Error: ID parameter is not set.";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}


?>