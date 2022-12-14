<?php

require_once("../includes/globalinclude.php"); // !edit path to file


use JTL\Review\ReviewModel;
use JTL\Review\ReviewHelpfulModel;

$productID = 0; // ID des Produktes
$customerID = 0;
$langID = 1; // ID der Sprache - Default = 1
$name = "Max Mustermann";
$title = "Review Titel";
$text = "Review Text";
$stars = 5; //Anzahl Sterne



$review = ReviewModel::loadByAttributes(
    ['productID' => $productID, 'customerID' => $customerID, 'name' => $name],
    $db,
    ReviewHelpfulModel::ON_NOTEXISTS_NEW
);

$review->productID  = $productID;
$review->customerID = $customerID;
$review->languageID = $langID;
$review->name       = $name;
$review->title      = $title;
$review->content    = \strip_tags($text);
$review->helpful    = 0;
$review->notHelpful = 0;
$review->stars      = $stars;
$review->active     = 0;
$review->date       = \date('Y-m-d H:i:s');

var_dump($review); //optional

$review->save();

?>
