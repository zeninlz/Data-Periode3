<?php
include "ìnfo-methode-tafel.php";


try {
    $tafels = new tafels($myDb);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tafels->insertTafels($_POST['tafelnr'], $_POST['bijzonderheden'], $_POST['aantalpersonen']);
        header("Location: overzicht-tafel.php");
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
                <label for="tafelnr" class="form-label">tafelnr:</label>
                <input type="number" class="form-control" id="tafelnr" name="tafelnr" placeholder="tafelnr">
            </div>
            <div class="mb-3">
                <label for="bijzonderheden" class="form-label">bijzonderheden:</label>
                <input type="text" class="form-control" id="bijzonderheden" name="bijzonderheden" placeholder="bijzonderheden">
            </div>
            <div class="mb-3">
                <label for="aantalpersonen" class="form-label">aantalpersonen:</label>
                <input type="number" class="form-control" id="aantalpersonen" name="aantalpersonen" placeholder="aantalpersonen">
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</body>
</html>
