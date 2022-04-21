<?php

  require 'core/session.php';
  require 'core/config.php';
  include 'core/user_key.php';
  $id = $_GET['id'];
//  require 'core/redirect.php';

 ?>
 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IT_LOG  </title>
    <link rel="shortcut icon" href="files/img/ico.ico">
    <link rel="stylesheet" href="files/css/bootstrap.css">
    <link rel="stylesheet" href="files/css/custom.css">
    <style media="screen">
    table{border: 0px;}
    td{
      padding:10px;
      border-top: 0px solid #eee;
      border-bottom: 0px solid #eee!important;
      padding-left: 0px;
      color:#0ea798;
    }
    input,button.log{width: 450px;}
    </style>
  </head>
  <body>
    <div class="cover user text-center" style="height:120px;">
      <br>
      <h2>Complaint</h2>
    </div>


    <div class="div">
        <div class="col-lg-12 ">
          <table>
          <?php
            $query1=mysql_query("SELECT * FROM `circle` WHERE id='$id'");
            while( $arry=mysql_fetch_array($query1) ) {
               echo "<tr> <td> <b> Profile Id </b> </td>";
               echo "     <td> ".$arry['id']."</td> </tr>";
               echo "<tr> <td> <b> Name </b> </td>";
               echo "     <td> ".$arry['name']."</td> </tr>";

               echo "<tr> <td> <b> Reference number </b> </td>";
               echo "     <td> ".$arry['ref_no']."</td> </tr>";

               echo "<tr> <td> <b> Email </b> </td>";
               echo "     <td> ".$arry['email']."</td> </tr>";
               echo "<tr> <td> <b> Phone number </b> </td>";
               echo "     <td> ".($arry['phone no'])."</td> </tr>";
               echo "<tr> <td> <b> Subject </b> </td>";
               echo "     <td> ".$arry['subject']."</td></tr>";

               echo "<tr> <td> <b> Complaint </b> </td>";
               echo "     <td> ".$arry['complain']."</td></tr>";

               echo "<tr> <td> <b> Technician </b> </td>";
               echo "     <td> ".$arry['dummy']."</td></tr>";

               echo "<tr> <td> <b> Status </b> </td>";
               echo "     <td> ".$arry['statuses']."</td></tr>";
             }
          ?>
          </table>
          <br><br><br><br>
          
        </div>
      </div>
