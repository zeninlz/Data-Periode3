<?php
include "ìnfo-methode-producten.php";


try {
    $producten = new Producten($myDb);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $producten->insertProducten($_POST['productnaam'], $_POST['omschrijving'], $_POST['prijs']);
        header("Location: overzicht-producten.php");
        exit; 
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Voeg nieuw product toe</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="productnaam" class="form-label">Naam:</label>
                <input type="text" class="form-control" id="productnaam" name="productnaam" placeholder="productnaam">
            </div>
            <div class="mb-3">
                <label for="omschrijving" class="form-label">Omschrijving:</label>
                <input type="text" class="form-control" id="omschrijving" name="omschrijving" placeholder="Omschrijving">
            </div>
            <div class="mb-3">
                <label for="prijs" class="form-label">Prijs:</label>
                <input type="text" class="form-control" id="prijs" name="prijs" placeholder="Prijs">
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</body>
</html>
