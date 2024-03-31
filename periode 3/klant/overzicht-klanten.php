<?php
include "ìnfo-methode-klanten.php"; 

try {
    $klanten = new klanten($myDb);
    $klantenData = $klanten->getAllklanten(); 
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht klanten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            padding-top: 20px;
        }
        .table-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .nav-pills {
            margin-bottom: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="table-container">
        <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">

            <li class="nav-item" role="presentation">
                <a class="nav-link rounded-5" href="../producten/overzicht-producten.php" aria-selected="false">producten</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link rounded-5" href="../tafel/overzicht-tafel.php" aria-selected="false">Tafels</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link rounded-5" href="../reseveringen/reseveringen-overzicht.php" aria-selected="false">Reserveringen</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link rounded-5" href="../bestellingen/overzicht-bestellingen.php" aria-selected="false">Bestellingen</a>
            </li>  
            <li class="nav-item" role="presentation">
                <button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab"  aria-selected="true" >klanten</button> 
            </li>
        </ul>
        
        <h1>Overzicht klanten</h1>
        <a href="invoegen-klanten.php" class="btn btn-secondary">klanten invoegen</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Naam</th>
                    <th scope="col">achternaam</th>
                    <th scope="col">email</th>
                    <th scope="col">nummer</th>
                    <th scope="col" colspan="2">Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($klantenData as $klant) { ?>
                <tr>
                    <td><?php echo $klant['klantenCode'];?></td>
                    <td><?php echo $klant['naam'];?></td>
                    <td><?php echo $klant['achternaam'];?></td>
                    <td><?php echo $klant['email'];?></td>
                    <td><?php echo $klant['nummer'];?></td>
                    <td><a href="edit-klanten.php?id=<?php echo $klant['klantenCode']; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="delete-klanten.php?id=<?php echo $klant['klantenCode']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  

</body>
</html>
