<?php

$woord = $_POST['woord'];

$requestURL = 'https://languagetool.org/api/v2/check?text=' . $woord . '&language=nl';

$curl = curl_init($requestURL);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

curl_close($curl);

$result = json_decode($result,true);

if ($result["matches"]) {

echo $result["matches"][0]["message"] . "<br>";

echo "<br> U schreef " . $woord . "<br>";

echo "<br> Bedoelt u: <br>";

for ($i=0; $i<count($result["matches"][0]["replacements"]); $i++) {
    echo $result["matches"][0]["replacements"][$i]["value"];
    echo "<br>";
    }

} else {
    echo "Er lijkt me niets mis met " . $woord;
}
