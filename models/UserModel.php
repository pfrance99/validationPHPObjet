<?php
include('Model.php');
/**
 *
 */
class UserModel extends Model
{

  public function __construct()
  {
    $this->tableName = 'users';
    parent::__construct();
  }

}
