<?php
include "info-methode-reseveringen.php"; 

$resevering = new reseveringen($myDb);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $resevering->updateReservering($_POST['datum'], $_POST['tijd'], $_POST['tafelnr'], $_GET['reseveringCode']);
        
        header("Location: reseveringen-overzicht.php");
        exit; 
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage(); 
    }   
}

try {
    $reseveringid = $_GET['reseveringCode'] ?? null; 
    $resevering = $resevering->getOneReservering($reseveringid)->fetch(PDO::FETCH_ASSOC); 
} catch (Exception $e) {
    echo "Error: " . $e->getMessage(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update reservering</title>
</head>
<body>
    <form method="POST">
        
        
        <label for="datum">Datum:</label>
        <input type="date" name="datum" value="<?php echo $resevering['datum'] ?? ''; ?>">
        <br>
        
        <label for="tijd">Tijd:</label>
        <input type="time" name="tijd" value="<?php echo $resevering['tijd'] ?? ''; ?>">
        <br>
        
        <label for="tafelnr">Tafelnummer:</label>
        <input type="number" name="tafelnr" value="<?php echo $resevering['tafelnr'] ?? ''; ?>">
        <br>

        <input type="submit" value="Update">
    </form>
</body>
</html>