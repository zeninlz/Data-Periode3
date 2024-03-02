<?php
include "ìnfo-producten.php"; // dit is om de klasse te pakken 

try {
    $producten = new Producten($myDb);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $producten->insertProducten($_POST['naam'], $_POST['omschrijving'], $_POST['prijs']);
        echo "toevoeging gelukt"; 
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <div>
            <input type="text" name="naam" placeholder="naam">
        </div>
        <div>
            <input type="text" name="omschrijving" placeholder="omschrijving">
        </div>
        <div>
            <input type="text" name="prijs" placeholder="prijs">
        </div>
        <div>
            <input type="submit"> 
        </div>
    </form>
</body>
</html>
