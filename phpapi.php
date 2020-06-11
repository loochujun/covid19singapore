<?php
$data     = file_get_contents('https://api.covid19api.com/country/singapore');
$jsonData = json_decode($data, true);
for ($i = 0; $i < count($jsonData); $i++) {
    if (isset($jsonData[$i - 1])) {
        $jsonData[$i]['actual'] = $jsonData[$i]['Confirmed'] - $jsonData[$i - 1]['Confirmed'];
    }else{
    	$jsonData[$i]['actual'] = 0;
    }
}
exit(json_encode($jsonData));