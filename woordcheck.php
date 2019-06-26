<?php

$woord = $_POST['woord'];

$requestURL = 'https://languagetool.org/api/v2/check?text=' . $woord . '&language=nl';

$curl = curl_init($requestURL);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

curl_close($curl);

// $result = file_get_contents($requestURL);    - can be used instead of curl but curl is quicker/safer(?)

$result = json_decode($result, true);

if ($result["matches"]) {

    echo $result["matches"][0]["message"] . "<br>";

    echo "<br> U schreef " . $woord . "<br>";

    echo "<br> Bedoelt u: <br>";

    foreach ($result["matches"][0]["replacements"] as $val) {
        echo $val["value"] . "</br>";
    }
} else {
    echo "Er lijkt me niets mis met " . $woord;
}
