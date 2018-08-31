<?php
/**
 * FICHIER DE CONFIGURATION DES DONNEES IMPORTANTES
 * A NE PAS COMMITER EN PROD
 */
  class Config
  {
    //Rajouter les constantes sensibles a la fin de cette array
    private static $config = array(
      'DB_NAME' => 'my_cms',
      'DB_USER' => 'root',
      'DB_PASS' => '0000',
      'LOGIN_URL' => '/auth/login',
      'LOGOUT_URL' => '/auth/logout',
      'BASE_VIEW' => '/view/home',
      'ADMIN_VIEW' => '/view/management'
    );

    public static function getAll()
    {
      return self::$config;
    }
  }
