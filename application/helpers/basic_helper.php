<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('loadAsset'))
{
  function loadAsset($fn) {
    echo "<link rel='stylesheet' type='text/css' href=" . base_url("Assets/".$fn) . " />";
  }
}