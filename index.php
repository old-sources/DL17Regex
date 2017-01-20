<?php

$examples = [
    [
        "regex" => "/DL/",
        "goods" => ['Salut les DLs!', 'DLOUDLOU', 'LDLDLDLDL'],
        "bads" => ['Salut les CDI!', 'LD'],
        "statement" => 'Exemple'
    ]
];
$exercises = [
   
];

function printExercises($exercises){
    foreach($exercises as $id => $exercise){
        printExercise($exercise["regex"], $exercise["goods"], $exercise["bads"], $exercise["statement"], $id + 1);
    }
}

function printExercise($regex, $goods, $bads, $statement, $nb = 0){
    echo "<h2 class=\"number\">$nb</h2>";
    echo "<p>$statement</p>";
    echo "<p class=\"alert alert-info\">REGEX : $regex</p>";
    echo "<p>Taille : " . strlen($regex) . " caractères</p>";
    printResult($regex, $goods);
    printResult($regex, $bads, false);
    echo "<hr/>";
}

function printResult($regex, $subjects, $flag = 1){
    echo "<div class=\"card\">";
    echo "<h4>" . ($flag ? "Bons" : "Mauvais") . " cas :</h4>";
    echo "<table class=\"table\">";
    echo "<tr>";
    echo "<th>Sujet</th>";
    echo "<th>Résultat</th>";
    echo "</tr>";
    foreach($subjects as $subject){
        $result = preg_match($regex, $subject);
        echo "<tr>";
        echo "<td>$subject</td>";
        echo "<td class=\"alert " . ($result ? "alert-success" : "alert-danger") . "\">";
        echo $result ? "OK" : "KO";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>REGEX</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    .card {
        background: #fff;
        border-radius: 2px;
        margin: 1rem;
        padding: 1em;
    }
    body{
        background-color: #f9f9f9;
    }
    .number{
        font-size: 1.8em;
        border: 1px solid grey;
        display: inline-block;
        width: 1.2em;
        height: 1.2em;
        text-align: center;
        border-radius: 1.2em;
        background-color: white;
    }
    .number, .card{
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    }
    </style>
</head>
<body>
    <main class="container">
        <h2>Exemples :</h2>
        <?php printExercises($examples) ?>
    </main>
</h1>
</body>
</html>