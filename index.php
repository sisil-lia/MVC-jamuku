<?php
require_once "router.php";
require_once "Model/Bahan.php";

get('/', 'views/home');
get('/bahan', function () {
  $bahanBahan = Bahan::get();
  return include 'views/listing-bahan.php';
});
get('/bahan/$id', function ($id) {
  $bahan = Bahan::find($id);
  if($bahan) {
    return include 'views/show-bahan.php';
  }
  return include 'views/404.php';
});
