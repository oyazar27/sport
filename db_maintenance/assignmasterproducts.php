<?php
include '../classes/Assign_Master_Product.php';

$new_assignment = new Assign_Master_Product();
$new_assignment -> Connect_to_Database();
$new_assignment -> Read_Product_Names();
$new_assignment -> Read_Master_Names();
$new_assignment -> Run_Comparison();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

