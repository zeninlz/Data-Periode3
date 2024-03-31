<?php
include "ìnfo-methode-producten.php"; 

$producten = new Producten($myDb);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        
        $producten->updateProducten($_POST['productnaam'], $_POST['omschrijving'], $_POST['prijs'], $_GET['id']);
        
        header("Location: overzicht-producten.php");
        exit; 
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage(); 
    }   
}


try {
    $productId = $_GET['id'] ?? null; 
    $product = $producten->getOneProducten($productId)->fetch(PDO::FETCH_ASSOC); 
} catch (Exception $e) {
    echo "Error: " . $e->getMessage(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
    <form method="POST">
    
    <label for="productnaam">Productnaam:</label>
    <input type="text" name="productnaam" value="<?php echo $product['productnaam'] ?? ''; ?>">
    <br>
        <label for="omschrijving">Omschrijving:</label>
        <input type="text" name="omschrijving" value="<?php echo $product['omschrijving'] ?? ''; ?>">
        <br>

        <label for="prijs">Prijs:</label>
        <input type="text" name="prijs" value="<?php echo $product['prijs'] ?? ''; ?>">
        <br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
