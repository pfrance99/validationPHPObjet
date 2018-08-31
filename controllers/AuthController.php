<?php
/**
 *
 */
class AuthController
{

  public function login()
  {
    echo TemplateHelper::createTemplate('login', new stdClass);
  }

  public function loginAction()
  {
    $user = new UserModel;
    $user->checkCredentials($_POST['username'], $_POST['password']);
  }

  public function logout()
  {
    session_destroy();
    header('Location: ' . $user->config['BASE_VIEW']);
  }
}
