<?php
/**
 *
 */
class ConnectionHelper
{
    const SESSION_KEY = 'currentUser';

    public static function checkConnectedUser(){
        if(isset($_SESSION[self::SESSION_KEY]))
        {
        }
        else {
          header('Location: /auth/login');
        }
    }
}
