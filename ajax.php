<?php
include "config.php";
include_once "common.php";
if (isset($_POST['getStatesByCounty']) == "getStatesByCounty") {
    $sub_countyData = '';
    $countyCode = $_POST['countyCode'];
    $common = new Common();
    $allSub_counties= $common->getStatesByCounty($link,$countyCode);
    if ($allSub_counties->num_rows>0){
        while ($sub_county = $allSub_counties->fetch_object()) {
            $sub_countyId = $sub_county->id;
            $sub_countyName = $sub_county->subCounty;
            $sub_countyData .= '<option value="'.$sub_countyId.'">'.$sub_countyName.'</option>';
        }
    }
    echo "test^".$sub_countyData;
}


/*
// (A) CONNECT TO DATABASE - CHANGE SETTINGS TO YOUR OWN!
if (!isset($_POST["segment"])) { exit(); }
$dbhost = "localhost";
$dbname = "test";
$dbchar = "utf8";
$dbuser = "root";
$dbpass = "";
try {
  $pdo = new PDO(
    "mysql:host=$dbhost;dbname=$dbname;charset=$dbchar",
    $dbuser, $dbpass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
    ]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }

// (B) GET ENTRIES FROM DATABASE
switch ($_POST["segment"]) {
  // (B0) INVALID
  default: exit();

  // (B1) COUNTRIES
  case "country":
    $stmt = $pdo->prepare("SELECT * FROM `countries`");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
      printf("<option value='%s'>%s</option>", $row["country_code"], $row["country_name"]);
    }
    break;

  // (B2) STATES
  case "state":
    $stmt = $pdo->prepare("SELECT * FROM `states` WHERE `country_code`=?");
    $stmt->execute([$_POST["country"]]);
    while ($row = $stmt->fetch()) {
      printf("<option value='%s'>%s</option>", $row["state_code"], $row["state_name"]);
    }
    break;

  // (B3) CITIES
  case "city":
    $stmt = $pdo->prepare("SELECT * FROM `cities` WHERE `country_code`=? AND `state_code`=?");
    $stmt->execute([$_POST["country"], $_POST["state"]]);
    while ($row = $stmt->fetch()) {
      printf("<option value='%s'>%s</option>", $row["city_name"], $row["city_name"]);
    }
    break;
}
?>


<script>
// (A) AJAX LOAD COUNTRY-STATE-CITY
//  1 = LOAD COUNTRY
//  2 = LOAD STATES
//  3 = LOAD CITIES
function cscload (entry) {
  // (A1) INIT
  var data = new FormData(), target, next;

  // (A2) LOAD COUNTRIES
  if (entry==1) {
    data.append("segment", "country");
    target = document.getElementById("sel-country");
    next = 2; // LOAD STATES AFTER COUNTRIES ARE POPULATED
  }

  // (A3) LOAD STATES
  else if (entry==2) {
    data.append("segment", "state");
    data.append("country", document.getElementById("sel-country").value);
    target = document.getElementById("sel-state");
    next = 3; // LOAD CITIES AFTER STATES ARE POPULATED
  }

  // (A4) LOAD CITIES
  else {
    data.append("segment", "city");
    data.append("country", document.getElementById("sel-country").value);
    data.append("state", document.getElementById("sel-state").value);
    target = document.getElementById("sel-city");
  }

  // (A5) GO!
  fetch("2-ajax.php", { method: "POST", body: data })
  .then((res) => { return res.text(); })
  .then((options) => {
    target.innerHTML = options;
    if (next) { cscload(next); }
  });
}

// (B) ON PAGE LOAD
window.addEventListener("DOMContentLoaded", function () {
  // (B1) UPDATE STATES WHEN COUNTRY CHANGED
  document.getElementById("sel-country").onchange = () => { cscload(2); };

  // (B2) UPDATE CITIES WHEN STATE CHANGED
  document.getElementById("sel-state").onchange = () => { cscload(3); };

  // (B3) INIT LOAD COUNTRIES
  cscload(1);
});
</script>

<form id="sel-form" onsubmit="return false;">
  <label for="sel-country">Country</label>
  <select id="sel-country"></select>

  <label for="sel-state">State</label>
  <select id="sel-state"></select>

  <label for="sel-city">City</label>
  <select id="sel-city"></select>

  <input type="submit" value="Go"/>
</form>*/