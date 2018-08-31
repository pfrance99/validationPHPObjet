<?php
include('Model.php');
 /**
  *
  */
 class PageModel extends Model
 {

   function __construct()
   {
     $this->tableName = 'pages';
     parent::__construct();
   }

 }
