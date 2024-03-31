<?php

include "info-methode-reseveringen.php";

$reseveringen = new reseveringen($myDb);

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        
        $reseveringen = $reseveringen->insertReservering($_POST['datum'],$_POST['tijd'],$_POST['klantencode'],$_POST['tafelnr']);
        header("Location: reseveringen-overzicht.php");
        
    } 
} catch (\Exception $e) {   
    echo $e->getMessage();
}
try {
    $klanten = new reseveringen($myDb);
    $klantenData = $klanten->getAllklanten(); 
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    $tafels = new reseveringen($myDb);
    $tafelsData = $tafels->getAlltafels(); 
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

</html>

    <div class="container">
        <h1>Voeg nieuwe reservering toe</h1>
        <form method="POST">

        <div class="mb-3">
    <label for="klantennaam" class="form-label">Selecteer klant:</label>
    <select id="klantennaam" name="klantencode">
        <?php foreach ($klantenData as $klant) { ?>
            <option value="<?php echo $klant['klantenCode']; ?>">
                <?php echo $klant['naam']; ?></option>
        <?php } ?>
    </select>
</div>

            <div class="mb-3">
                <label for="tafelnr" class="form-label">Selecteer tafel:</label>
                <select id="tafelnr" name="tafelnr">
                <?php foreach ($tafelsData as $tafels) { ?>
                  <option value="<?php echo $tafels['tafelCode']; ?>">
                 <?php echo $tafels['tafelCode']; ?></option> <?php } ?>
            </select>
            </div>
            <div class="mb-3">
                <label for="datum" class="form-label">Datum:</label>
                <input type="date" class="form-control" id="datum" name="datum">
            </div>
            <div class="mb-3">
                <label for="tijd" class="form-label">Tijd:</label>
                <input type="time" class="form-control" id="tijd" name="tijd">
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</body>
</html>