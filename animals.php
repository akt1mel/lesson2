<?php

$animals = [
    "Asia" => ["Nasalis larvatus", "Varanus komodoensis", "Loriinae"],
    "Australia" => ["Cacatuidae", "Macropus", "Vombatidae"],
    "Antarctica" => ["Lobodon carcinophagus", "Spheniscidae"],
    "Europe" => ["Lynx", "Ursus arctos", "Alces alces"],
    "North America" => ["Martes", "Mustela nivalis"],
    "South America" => ["Cingulata", "Hydrochoerus hydrochaeris"]
];
$doubleNameAnimals = []; //массив названий животных из двух слов
$firsWordNewAnimal = []; //массив для первых слов новых животных
$secondWordNewAnimal = []; //массив для вторых слов новых животных

foreach ($animals as $region => $animal) {
    foreach ($animal as $i) {
        if (str_word_count($i) == 2) { // Выполняем проверку содержания двух слов в названии
            $doubleNameAnimals[] = $i;
            $firsWordNewAnimal[$region][] = explode(" ", $i)[0];
            $secondWordNewAnimal[] = explode(" ", $i)[1];
            echo "$i<br>";
        }
    }

}


shuffle($secondWordNewAnimal);

$newAnimals = []; //массив для новых животных

foreach ($firsWordNewAnimal as $region => $firstWord) {

    echo "<h2>$region</h2>";

    foreach ($firstWord as $firstNew) {
        $secondNew = array_shift($secondWordNewAnimal);
        $newAnimals[$region][] = "$firstNew "."$secondNew";
    }

    echo implode(", ", $newAnimals[$region]);
}
