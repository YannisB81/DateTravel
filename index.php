<?php
    $presentTime = new DateTime();
    $presentTime->format('Y-m-d H:i');
    if (!empty($_POST))
    {
        $destinationTime = new DateTime($_POST['destination-time']);
        $destinationTime->format('Y-m-d H:i');
        $intervalTravel = $presentTime->diff($destinationTime);
        $intervalMin = ($intervalTravel->format('%a')) * 24 * 60;
        $fuel = round(($intervalMin / 10000), 0, PHP_ROUND_HALF_UP);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Retour vers le futur</title>
</head>
<body class="text-center"><br>
    <form action="" method="POST">
        <label for="destination-time">Choisissez une date et heure de destination :</label><br>
        <input type="datetime-local" id="destination-time"
        name="destination-time" value="">
        <input type="submit" value="Valider">
    </form><br>
    <h2>PRESENT TIME</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Month</th>
                <th>Day</th>
                <th>Year</th>
                <th></th>
                <th>Hour</th>
                <th>Min</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><?= $presentTime->format('M')?></th>
                <th><?= $presentTime->format('d')?></th>
                <th><?= $presentTime->format('Y')?></th>
                <th><?= $presentTime->format('A')?></th>
                <th><?= $presentTime->format('g')?></th>
                <th><?= $presentTime->format('i')?></th>
            </tr>
        </tbody>
    </table><br>
    <h2>DESTINATION TIME</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Month</th>
                <th>Day</th>
                <th>Year</th>
                <th></th>
                <th>Hour</th>
                <th>Min</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><?= $destinationTime->format('M')?></th>
                <th><?= $destinationTime->format('d')?></th>
                <th><?= $destinationTime->format('Y')?></th>
                <th><?= $destinationTime->format('A')?></th>
                <th><?= $destinationTime->format('g')?></th>
                <th><?= $destinationTime->format('i')?></th>
                
            </tr>
        </tbody>
    </table><br>
    <h2>Intervalle et consommation du voyage</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Day</th>
                <th>Month</th>
                <th>Year</th>
                <th>Hour</th>
                <th>Min</th>
                <th></th>
                <th>Total de min</th>
                <th>Carburant (L)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><?= $intervalTravel->format('%d')?></th>
                <th><?= $intervalTravel->format('%m')?></th>
                <th><?= $intervalTravel->format('%y')?></th>
                <th><?= $intervalTravel->format('%h')?></th>
                <th><?= $intervalTravel->format('%i')?></th>
                <th></th>
                <th><?= $intervalMin ?></th>
                <th><?= $fuel ?></th>
                
            </tr>
        </tbody>
    </table><br>
</body>
</html>