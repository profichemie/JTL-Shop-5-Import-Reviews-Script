<?php

require_once("../includes/globalinclude.php");

require_once("./reviews.php");

use JTL\Review\ReviewModel;
use JTL\Review\ReviewHelpfulModel;

$productID = 0; //ID des Produkts
$customerID = 0;
$langID = 1; // ID der Sprache

foreach ($cReviews as $cReview => $cValue) {

    $review = ReviewModel::loadByAttributes(
        ['productID' => $productID, 'customerID' => $customerID, 'name' => $cValue['name']],
        $db,
        ReviewHelpfulModel::ON_NOTEXISTS_NEW
    );

    $review->productID  = $productID;
    $review->customerID = $customerID;
    $review->languageID = $langID;
    $review->name       = $cValue['name'];
    $review->title      = $cValue['title'];
    $review->content    = \strip_tags($cValue['text']);
    $review->helpful    = 0;
    $review->notHelpful = 0;
    $review->stars      = $cValue['stars'];
    $review->active     = 0;
    $review->date       = \date('Y-m-d H:i:s',strtotime($cValue['date']));

    $review->save();
}

?>
