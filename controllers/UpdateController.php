<?php
/**
 *
 */
class UpdateController
{
    static public function home() {
      $page = new PageModel();
      echo TemplateHelper::modifyTemplate('home', $page->getOne('title', 'Home'));
    }

    static public function contact() {
      $page = new PageModel();
      echo TemplateHelper::modifyTemplate('contact', $page->getOne('title', 'Contact'));
    }

    static public function sponsor() {
      $page = new PageModel();
      echo TemplateHelper::modifyTemplate('sponsor', $page->getOne('title', 'Sponsor'));
    }

    static public function updateAction() {
      $page = new PageModel();
      $page->updateOne($_POST['title'], $_POST['content'], isset($_POST['hidden'])? 1 : 0);
      //redirection
    }
}
