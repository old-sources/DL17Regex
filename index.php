<?php
// git@github.com:imie-source/DL17Regex.git
// https://github.com/imie-source/DL17Regex.git

$examples = [
    [
        "regex" => "/DL/",
        "goods" => ['Salut les DLs!', 'DLOUDLOU', 'LDLDLDLDL'],
        "bads" => ['Salut les CDI!', 'LD'],
        "statement" => 'Exemple'
    ],
    [
        "regex" => "/^DL/",
        "goods" => ['DL, c\'est la vie.', 'DLOUDLOU'],
        "bads" => ['Salut les DL', "LDLDLDLDL"],
        "statement" => "Exemple"
    ],
    [
        "regex" => "/DL$/",
        "goods" => ['Salut les DL', 'DL', "LDLDLDLDL", ],
        "bads" => ['DL, c\'est la vie.', 'DLOUDLOU'],
        "statement" => "Exemple"
    ],
    [
        "regex" => "/^DL$/",
        "goods" => ['DL'],
        "bads" => ['DL, c\'est la vie.', 'DLOUDLOU', 'DLDLDL'],
        "statement" => "Exemple"
    ],
    [
        "regex" => "/t.t./",
        "goods" => ['tata', 'titi', 'tttt', 'taratata', 't8t9', 't@t#', 't t t t t'],
        "bads" => ['toutou', 'tartine', 'tot', 'to'],
        "statement" => "Exemple"
    ],
    [
        "regex" => "/^t[aeiou]t[aeiou]$/",
        "goods" => ['tata', 'tati', 'toto', 'totu', 'tito'],
        "bads" => ['toutou', 'tyty', 'tut', 'tsts', 'tttt', 'totototo'],
        "statement" => "Exemple"
    ],
    [
        "regex" => "/^t[a-tA-C1-5]t[A-Z]$/",
        "goods" => ['tAtA', 't1tZ', 'tatZ'],
        "bads" => ['tata', 'tutA', 'tEtA', 'tat1'],
        "statement" => "Exemple"
    ],
    [
        "regex" => "/^[abc].[def]$/",
        "goods" => ['bad', 'bof', 'bid', 'cif'],
        "bads" => ['daf'],
        "statement" => "Exemple"
    ],
    [
        "regex" => "/^(oui|non)$/",
        "goods" => ['oui', 'non'],
        "bads" => ['ouais', 'bod', 'nop', 'nan'],
        "statement" => "Exemple",
    ],
    [
        "regex" => "/^ch(ien|at)$/",
        "goods" => ['chien', 'chat'],
        "bads" => ['cheval', 'chameau'],
        "statement" => "Exemple",
    ],
    [
        "regex" => "/^(t[aeiou]){2}$/",
        "goods" => ['tata', 'tito', 'tati'],
        "bads" => ['toutou'],
        "statement" => "Exemple",
    ],
    [
        "regex" => "/^.{4,6}$/",
        "goods" => ['tata', 'tito', 'tati', '      '],
        "bads" => ['top', '1234567'],
        "statement" => "Exemple",
    ],
    [
        "regex" => "/^0{1,9}[A-Z]{3}$/",
        "goods" => ['000AZE', '0TRE'],
        "bads" => ['TRE', '000aze'],
        "statement" => "Exemple",
    ],
    [
        "regex" => "/^1[2-8]?9$/",
        "goods" => ['19', '129', '139', '149'],
        "bads" => ['119'],
        "statement" => "Exemple",
    ],
    [
        "regex" => "/^bo*m$/",
        "goods" => ['boooooooooooooooooom', 'booom', 'booooooom'],
        "bads" => ['bim'],
        "statement" => "Exemple",
    ],
    [
        "regex" => "/^ta+$/",
        "goods" => ['taaaaaaaaaaaa', 'ta', 'taaaaa'],
        "bads" => ['bim'],
        "statement" => "Exemple",
    ]
];

$exercises = [
    [
        "regex" => "/^\.od[tps]$/",
        "goods" => ['.odt', '.ods', '.odp'],
        "bads" => ['odt', '.odf', 'test.odt', ',odt', '.exe', 'oodt'],
        "statement" => "Vérifier qu'une extension est une extension LibreOffice (.odt, .odp, .ods).",
    ],
    [
        "regex" => "/^.{1,9}$/",
        "goods" => ['.odt', '@', '123456789', 'héhéhé'],
        "bads" => ['skfhskdjfhkjsdhfjkh', ''],
        "statement" => "Une chaîne non vide de moins de 10 caractères.",
    ],
    [
        "regex" => "/^\d{4,8}$/",
        "goods" => ['0000', '1234', '12345678'],
        "bads" => ['abcdef', '000', '123456789'],
        "statement" => "Un code PIN de téléphone portable (entre 4 et 8 chiffres).",
    ],
    [
        "regex" => "/^J(im|oe)$/",
        "goods" => ['Jim', 'Joe'],
        "bads" => ['Jimmy', 'Joey', 'JOE'],
        "statement" => "Jim ou Joe.",
    ]
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
        <h2>Exercices :</h2>
        <?php printExercises($exercises) ?>
    </main>
</h1>
</body>
</html>