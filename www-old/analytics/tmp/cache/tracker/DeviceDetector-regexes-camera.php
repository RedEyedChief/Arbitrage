<?php
$content   = array (
  'Nikon' => 
  array (
    'regex' => 'Coolpix S800c',
    'device' => 'camera',
    'model' => 'Coolpix S800c',
  ),
  'Samsung' => 
  array (
    'regex' => 'EK-GC([0-9]{3})',
    'device' => 'camera',
    'models' => 
    array (
      0 => 
      array (
        'regex' => 'EK-GC100',
        'model' => 'GALAXY Camera',
      ),
      1 => 
      array (
        'regex' => 'EK-GC110',
        'model' => 'GALAXY Camera WiFi only',
      ),
      2 => 
      array (
        'regex' => 'EK-GC200',
        'model' => 'GALAXY Camera 2',
      ),
      3 => 
      array (
        'regex' => 'EK-GC([0-9]{3})',
        'model' => 'GALAXY Camera $1',
      ),
    ),
  ),
);
$expires_on   = 1428600235;
$cache_complete   = true;
?>