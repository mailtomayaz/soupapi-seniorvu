<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//url arg: ?&phone=8168885501&first_name=Ayaz&last_name=M&street=123 Main&city=Kansas City&state=MO&zip=64116&email=rpusateri@condadogroup.com
//rest library
require_once('rest.inc.php');
// Receive Five9 Data

$m_email = $_GET['email'];
$m_firstname = $_GET['first_name'];
$m_lastname = $_GET['last_name'];
$m_dob = $_GET['dob'];
$m_gender = $_GET['firstname'];
$m_maritalstatus = $_GET['lastname'];
$m_annualincome = $_GET['annualincome'];
$m_networth = $_GET['networth'];
$m_phone = $_GET['phone'];
$m_address1 = $_GET['address1'];
$m_address2 = $_GET['address2'];
$m_city = $_GET['city'];
$m_state = $_GET['state'];
$m_zip = $_GET['zip'];
$m_source = $_GET['source'];
$m_key = $_GET['key'];

//json array

$jsonData = array();

//Mandatory fields
$jsonData['firstName'] = $m_firstname;
$jsonData['lastName'] = $m_lastname;
$jsonData['phone'] = $m_phone;
$jsonData['key'] = 'ccdd7667-e076-4266-8e0e-bc7d5f235b21';

//validation 
if ($m_email != '') {
    $jsonData['email'] = $m_email;
}
//if ($m_firstname != '') {
//    $jsonData['firstName'] = $m_firstname;
//}
//if ($m_lastname != '') {
//    $jsonData['lastName'] = $m_lastname;
//}
if ($m_dob != '') {
    $jsonData['dob'] = $m_dob;
}
if ($m_gender != '' || $m_gender != '' || $m_gender != '') {
    $jsonData['gender'] = $m_gender;
}
if ($m_maritalstatus != '') {
    $jsonData['maritalStatus'] = $m_maritalstatus;
}
if ($m_annualincome != '') {
    $jsonData['annualIncome'] = $m_annualincome;
}
if ($m_networth != '') {
    $jsonData['netWorth'] = $m_networth;
}
//if ($m_phone != '') {
//    $jsonData['phone']=$m_phone;
//}
if ($m_address1 != '') {
    $jsonData['address1'] = $m_address1;
}
if ($m_address2 != '') {
    $jsonData['address2'] = $m_address2;
}
if ($m_city != '') {
    $jsonData['city'] = $m_city;
}
if ($m_state != '') {
    $jsonData['state'] = $m_state;
}
if ($m_zip != '') {
    $jsonData['zip'] = $m_zip;
}
if ($m_source != '') {
    $jsonData['source'] = $m_source;
}
                  
//authentication and authorization
$auth = 'https://staging.seniorvu.com/auth/login';
$authData = array(
    "email" => "admin@example.com",
    "password"=> "admin"
);
//post jsondatga
$auth_result = RestCurl::post($auth, $authData);
//get authorization token
$tokenKey = $auth_result['data']->token;

//testing url
$url = "https://staging.seniorvu.com/v1/leads";
//live url
//$url = "https://www.seniorvu.com/v1/:object";
$result = RestCurl::post($url, $jsonData,$tokenKey);
//echo "<pre>";
//print_r($result);

?>