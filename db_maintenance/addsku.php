<?php
include '../classes/Assign_Master_Product.php';

$new_SKU = new Assign_Master_Product();
$new_SKU  -> Connect_to_Database();
$new_SKU  -> Assign_SKU();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

