<?php 
include "info-methode-bestellingen.php";

$bestellingen = new bestellingen($myDb);

try {
    if (isset($_GET['bestellingenCode'])) {
        $bestellingen->deletebestellingen($_GET['bestellingenCode']);
        header("Location:  overzicht-bestellingen.php");
    } else {
        echo "Error: ID parameter is not set.";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}


?>