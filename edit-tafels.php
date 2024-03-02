<?php
include "ìnfo-methode-tafel.php"; 


$tafels = new tafels($myDb); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        
        $tafels->updateTafels($_POST['tafelnr'], $_POST['bijzonderheden'], $_POST['aantalpersonen'], $_GET['id']);
        
        header("Location: overzicht-tafel.php");
        exit; 
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage(); 
    }
}


try {
    $tafelId = $_GET['id'] ?? null; 
    $tafels = $tafels->getOneTafels($tafelId)->fetch(PDO::FETCH_ASSOC); 
} catch (Exception $e) {
    echo "Error: " . $e->getMessage(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update tafels</title>
</head>
<body>
    <form method="POST">
        <label for="name">tafelnr:</label>
        <input type="number" name="tafelnr" value="<?php echo $tafels['tafelnr'] ?? ''; ?>">
        <br>
        
        <label for="bijzonderheden">bijzonderheden:</label>
        <input type="text" name="bijzonderheden" value="<?php echo $tafels['bijzonderheden'] ?? ''; ?>">
        <br>

        <label for="aantalpersonen">aantalpersonen:</label>
        <input type="number" name="aantalpersonen" value="<?php echo $tafels['aantalpersonen'] ?? ''; ?>">
        <br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
