<?php

$xml = simplexml_load_file('movies_list.xml');

$list = $xml->movie;
for ($i=0; $i < count($list); $i++) { 
    echo '<b>id Movie: </b>'.$list[$i]->attributes()->movie_id.'<br>';
    echo '<b>Title: </b>'.$list[$i]->Title.'<br>';
    echo '<b>Year: </b>'.$list[$i]->Year.'<br>';
    echo '<b>Genre: </b>'.$list[$i]->Genre.'<br>';
    echo '<b>Ratings: </b>'.$list[$i]->Ratings.'<hr>';
}