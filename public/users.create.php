<?php

/*INCLUDE IN BOOTSTRAP.PHP....require_once '../utils/InputWineseller.php';*/
require_once '../models/UserModelWineseller.php';

/*check if field has been submitted and input has correct value THEN make a new User object


- assign properties and try to save to DB- build out in php - require post input for all fields*/

$user = User::all();

var_dump($user);

$newUser = new User();
$newUser->username = 'Fictional';
$newUser->password = 'ADD HERE';
$newUser->email = 'fict@gmail.com';
$newUser->age = '40';

$newUser->save();


if(!empty($_POST)) {
  if (Input::has('username') && 
    Input::has('password') {
      $user = new User();
      $ad->vendor_name = Input::get('vendor_name');
      $ad->location_city_code = Input::get('location_city_code');
      $ad->location_state_code = Input::get('location_state_code');
      $ad->location_zip_code = Input::get('location_zip_code');
      $ad->product_category = Input::get('product_category');
      $ad->product_origin = Input::get('product_origin');
      $ad->product_style = Input::get('product_style');
      $ad->bvintage_year = Input::get('vintage_year');
      $ad->price = Input::get('price');
      $ad->description = Input::get('description');
      $ad->save();
  }
}
?>

<!-- add HTML for create user form -->