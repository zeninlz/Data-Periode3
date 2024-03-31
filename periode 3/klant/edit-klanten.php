<?php
include "ìnfo-methode-klanten.php"; 

$klanten = new klanten($myDb);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        
        $klanten->updateklanten($_POST['naam'], $_POST['achternaam'], $_POST['email'], $_POST['nummer'], $_GET['id']);
        
        header("Location: overzicht-klanten.php");
        exit; 
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage(); 
    }   
}


try {
    $klantenId = $_GET['id'] ?? null; 
    $klant = $klanten->getOneklanten($klantenId)->fetch(PDO::FETCH_ASSOC); 
} catch (Exception $e) {
    echo "Error: " . $e->getMessage(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Klant</title>
</head>
<body>
    <form method="POST">
        <label for="name">Naam:</label>
        <input type="text" name="naam" value="<?php echo $klant['naam'] ?? ''; ?>">
        <br>
        
        <label for="achternaam">Achternaam:</label>
        <input type="text" name="achternaam" value="<?php echo $klant['achternaam'] ?? ''; ?>">
        <br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $klant['email'] ?? ''; ?>">
        <br>
        
        <label for="nummer">Nummer:</label>
        <input type="number" name="nummer" value="<?php echo $klant['nummer'] ?? ''; ?>">
        <br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
