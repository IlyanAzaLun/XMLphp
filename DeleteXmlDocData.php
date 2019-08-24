<?php 

$xml = new DomDocument( '1.0' );
$xml->load('movies_list.xml');
$xml->formatOutput = true;
$thedocument = $xml->documentElement;
$list = $thedocument->getElementsByTagName('movie');

foreach ($list as $domElement) {
    $attrValue = $domElement->getAttribute('movie_id');
    if ($attrValue == 10) {
        $domElement->parentNode->removeChild($domElement);

        $array=array(
            "movie_id:" => $attrValue,
            "massage:"  => "data success deleted"
        );
    }
    else {
        $array=array(
            "movie_id:" => $attrValue,
            "massage:"  => "unknown movie_id"
        );
    }
}

print_r(json_encode($array));

$xml->save('movies_list.xml');