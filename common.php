<?php
/**
 * Created by PhpStorm.
 * User: Ankit
 * Date: 11/29/2018
 * Time: 7:50 PM
 */

class Common {
    public function getCounties($link){
        $query = "SELECT * FROM `counties`";
        $result = $link->query($query);
        return $result;
    }

    public function getStatesByCounty($link,$countyId) {
        $query = "SELECT * FROM `sub_county` WHERE countyCode='$$countyCode;'";
        $result = $link->query($query);
        return $result;
    }

}