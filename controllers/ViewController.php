<?php
/**
 *
 */
class ViewController
{
    static public function home() {
      $page = new PageModel();
      echo TemplateHelper::createTemplate('home', $page->getOne('title', 'Home'));
    }

    static public function management() {
      $page = new PageModel();
      ConnectionHelper::checkConnectedUser();
      echo TemplateHelper::managementTemplate($page->getAll());
    }

    static public function contact() {
      $page = new PageModel();
      echo TemplateHelper::createTemplate('contact', $page->getOne('title', 'Contact'));
    }

    static public function sponsor() {
      $page = new PageModel();
      echo TemplateHelper::createTemplate('sponsor', $page->getOne('title', 'Sponsor'));
    }
}
