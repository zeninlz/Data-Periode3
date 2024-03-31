<?php
include "ìnfo-methode-tafel.php"; 

try {
    $tafels = new tafels($myDb);
    $tafelData = $tafels->getAllTafels(); 
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht tafels</title>
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
                <button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab"  aria-selected="true" >tafels</button> 
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link rounded-5" href="../reseveringen/reseveringen-overzicht.php" aria-selected="false">Reserveringen</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link rounded-5" href="../bestellingen/overzicht-bestellingen.php" aria-selected="false">Bestellingen</a>
            </li>  
            <li class="nav-item" role="presentation">
                <a class="nav-link rounded-5" href="../klant/overzicht-klanten.php" aria-selected="false">Klanten</a>
            </li>
        </ul>
        
        <h1>Overzicht tafels</h1>
        <a href="invoegen-tafels.php" class="btn btn-secondary">tafels invoegen</a> 

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">tafelnr</th>
                    <th scope="col">bijzonderheden</th>
                    <th scope="col">aantalpersonen</th>
                    <th scope="col" colspan="2">Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tafelData as $tafels) { ?>
                <tr>
                    <td><?php echo $tafels['tafelCode'];?></td>
                    <td><?php echo $tafels['tafelnr'];?></td>
                    <td><?php echo $tafels['bijzonderheden'];?></td>
                    <td><?php echo $tafels['aantalpersonen'];?></td>
                    <td><a href="edit-tafels.php?id=<?php echo $tafels['tafelCode'];?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="delete-tafels.php?id=<?php echo $tafels['tafelCode'];?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  

</body>
</html>
