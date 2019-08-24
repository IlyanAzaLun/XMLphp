<?php
$xmldoc = new DomDocument( '1.0' );
$xmldoc->preserveWhiteSpace = false;
$xmldoc->formatOutput = true;

$movieId = 10;
$title = "new Title";
$year = date('Y-m-d');
$genre = "new Genre";
$ratings = 6.11;

// DATA POST @_@

// $movieId = $_GET['id'];
// $title = $_GET['title'];
// $year = date('Y-m-d');
// $genre = $_GET['genre'];
// $ratings = $_GET['ratings'];

$content = "true";

if( $xml = file_get_contents( 'movies_list.xml') ) {
    $xmldoc->loadXML( $xml, LIBXML_NOBLANKS );

    // find the Movies tag
    $root = $xmldoc->getElementsByTagName('Movies')->item(0);

    // create the <product> tag
    $product = $xmldoc->createElement('movie');
    $numAttribute = $xmldoc->createAttribute("movie_id");
    $numAttribute->value = $movieId;
    $product->appendChild($numAttribute);

    // add the product tag before the first element in the <Movies> tag
    $root->insertBefore( $product, $root->firstChild );

    // create other elements and add it to the <product> tag.
    $nameElement = $xmldoc->createElement('Title');
    $product->appendChild($nameElement);
    $nameText = $xmldoc->createTextNode($title);
    $nameElement->appendChild($nameText);

    $categoryElement = $xmldoc->createElement('Year');
    $product->appendChild($categoryElement);
    $categoryText = $xmldoc->createTextNode($year);
    $categoryElement->appendChild($categoryText);

    $categoryElement = $xmldoc->createElement('Genre');
    $product->appendChild($categoryElement);
    $categoryText = $xmldoc->createTextNode($genre);
    $categoryElement->appendChild($categoryText);

    $categoryElement = $xmldoc->createElement('Ratings');
    $product->appendChild($categoryElement);
    $categoryText = $xmldoc->createTextNode($ratings);
    $categoryElement->appendChild($categoryText);

    $availableElement = $xmldoc->createElement('available');
    $product->appendChild($availableElement);
    $availableAttribute = $xmldoc->createAttribute("content");
    $availableAttribute->value = $content;
    $availableElement->appendChild($availableAttribute);

    $array=array(
        "massage" => "Successfully add data!",
        "id"      => $movieId,
        "title"   => $title,
        "year"    => $year,
        "genre"   => $genre,
        "ratings" => $ratings
    );

    $xmldoc->save('movies_list.xml');
    
}
print_r(json_encode($array));
?>