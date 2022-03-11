<?php
include "config.php";
include_once "common.php";
if (isset($_POST['getStatesByCounty']) == "getStatesByCounty") {
    $subcountyData = '';
    $countyCode = $_POST['countyCode'];
    $common = new Common();
    $allSub_counties= $common->getStatesByCounty($link,$countyCode);
    if ($allSub_counties->num_rows>0){
        while ($subcounty = $allSub_counties->fetch_object()) {
            $subcountyId = $subcounty->id;
            $subcountyName = $sub_county->subCounty;
            $subcountyData = '<option value="'.$subcountyId.'">'.$subcountyName.'</option>';
        }
    }
    echo "test^".$subcountyData;
}

