<?php

include "info-methode-bestellingen.php";

$bestellingen = new bestellingen($myDb);

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        
        $bestellingen = $bestellingen->insertbestellingen($_POST['reseveringCode'],$_POST['productenCode']);
        header("Location: overzicht-bestellingen.php");
        
    } 
} catch (\Exception $e) {   
    echo $e->getMessage();
}
try {
    $producten = new bestellingen($myDb);
    $productenData = $producten->getAllproducten(); 
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    $reseveringen = new bestellingen($myDb);
    $reseveringenData = $reseveringen->getAllreseveringen(); 
} catch (Exception $e) {
    echo $e->getMessage();
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg nieuwe bestelling toe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Voeg nieuwe bestelling toe</h1>
    <form method="POST">

        <div class="mb-3">
            <label for="reseveringCode" class="form-label">Selecteer reservering:</label>
            <select id="reseveringCode" name="reseveringCode">
                <?php foreach ($reseveringenData as $reservering) { ?>
                    <option value="<?= $reservering['reseveringCode']; ?>">
                        <?= $reservering['tijd']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="productenCode" class="form-label">Selecteer product:</label>
            <select id="productenCode" name="productenCode">
                <?php foreach ($productenData as $product) { ?>
                    <option value="<?= $product['productenCode']; ?>">
                        <?= $product['productnaam']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Toevoegen</button>
    </form>
</div>

</body>
</html>