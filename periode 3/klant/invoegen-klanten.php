<?php
include "ìnfo-methode-klanten.php";


try {
    $klanten = new klanten($myDb);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $klanten->insertklanten($_POST['naam'], $_POST['achternaam'], $_POST['email'],$_POST['nummer']);
        header("Location: overzicht-klanten.php");
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
                <label for="naam" class="form-label">naam:</label>
                <input type="text" class="form-control" id="naam" name="naam" placeholder="naam">
            </div>
            <div class="mb-3">
                <label for="achternaam" class="form-label">achternaam:</label>
                <input type="text" class="form-control" id="achternaam" name="achternaam" placeholder="achternaam">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="email">
            </div>
            <div class="mb-3">
                <label for="nummer" class="form-label">nummer:</label>
                <input type="number" class="form-control" id="nummer" name="nummer" placeholder="nummer">
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</body>
</html>
