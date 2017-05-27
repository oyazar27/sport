<?php
include '../classes/AssignProductDetails.php';

$new_product = new AssignProductDetails();
$new_product -> Connect_to_Database();
$new_product -> Read_Product_Names();
$new_product -> Read_Master_Data();
$new_product -> Assign_SKU_from_Model();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

