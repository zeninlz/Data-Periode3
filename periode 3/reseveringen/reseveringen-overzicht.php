<?php
include "info-methode-reseveringen.php"; 

try {
    $reseveringen = new reseveringen($myDb);
    $reseveringen = $reseveringen->getAllReserveringen(); 
} catch (Exception $e) {
    echo $e->getMessage();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht resevering</title>
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
                <button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab"  aria-selected="true" >reseveringen</button> 
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link rounded-5" href="../bestellingen/overzicht-bestellingen.php" aria-selected="false">Bestellingen</a>
            </li>  
            <li class="nav-item" role="presentation">
                <a class="nav-link rounded-5" href="../klant/overzicht-klanten.php" aria-selected="false">klanten</a>
            </li>  
        </ul>
        
        <h1>Overzicht resevering</h1>
        <a href="invoegen-reseveringen.php" class="btn btn-secondary">reseveringen invoegen</a>

        <table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">datum</th>
            <th scope="col">tijd</th>
            <th scope="col">klantenCode</th>
            <th scope="col">klantenNaam</th>
            <th scope="col">tafelnr</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reseveringen as $reservering) { ?>
            <tr>
                <td><?php echo $reservering['reseveringCode']; ?></td>
                <td><?php echo $reservering['datum']; ?></td>
                <td><?php echo $reservering['tijd']; ?></td>
                <td><?php echo $reservering['klantennaam']; ?></td>
                <td><?php echo $reservering['naam']; ?></td>
                <td><?php echo $reservering['tafelnr']; ?></td>
                
                <td><a href="delete-reseveringen.php?reseveringCode=<?php echo $reservering['reseveringCode']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  

</body>
</html>
