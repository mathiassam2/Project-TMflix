<?php 
require_once("PayPal-PHP-SDK/autoload.php");

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AbBS6oP9EgKGe48s4nL2NzteIzVTJcwbWsfT8-PfOw_n7Zm1wQpWIJTtZ2oL9R72o_Di7A-vXZACEUxd',     // ClientID
        'EHuuj-q_gu1ypm_mukbSPpdqfV_YRWyLZf4nkY6bmd3nQvhG6clyAtR4qUe1iQy3wYGKNX8sXxhulqYe'      // ClientSecret
    )
);
?>