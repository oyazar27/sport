<?php
include '../classes/Assign_Master_Product.php';

$new_assignment = new Assign_Master_Product();
$new_assignment -> Connect_to_Database();
$new_assignment -> Read_Master_Data();
$new_assignment -> Get_Model();
$new_assignment -> Get_Alt_Model();
$new_assignment -> Write_Data();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

