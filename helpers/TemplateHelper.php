<?php
/**
 *
 */
class TemplateHelper
{

  const TEMPLATE_DIRECTORY = 'views';

  public static function createTemplate(String $templateName, stdClass $content)
  {
      $header = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/header.html');
      $emptyTemplate = file_get_contents(self::TEMPLATE_DIRECTORY . '/' . $templateName . '.html');
      $footer = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/footer.html');
      $result = $header . $emptyTemplate . $footer;

      foreach ($content as $key => $value) {
        if(strpos($result, '%%' .strtoupper($key) . '%%')){
          $result = str_replace('%%' . strtoupper($key) . '%%', $value, $result);
        }
      }
      return $result;
  }

  public static function defaultTemplate()
  {
      $header = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/header.html');
      $body = file_get_contents(self::TEMPLATE_DIRECTORY . '/default.html');
      $footer = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/footer.html');
      $result = $header . $body . $footer;
      return $result;
  }

  public static function managementTemplate($content){
      $header = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/header.html');
      $body = file_get_contents(self::TEMPLATE_DIRECTORY . '/management.html');
      $footer = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/footer.html');
      $result = $header . $body . $footer;
      $list = '';
      foreach ($content as $page) {
          $list = "$list <li><a href='/update/".strtolower($page->title)."'>$page->title</a></li>";
      }
      $result = str_replace('%%PAGES%%', $list, $result);
      return $result;
  }

  public static function modifyTemplate(String $title, stdClass $content){
      $header = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/header.html');
      $body = file_get_contents(self::TEMPLATE_DIRECTORY . '/update.html');
      $footer = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/footer.html');
      $result = $header . $body . $footer;
      $result = str_replace('%%TITLE%%', $content->title, $result);
      $result = str_replace('%%CONTENT%%', $content->content, $result);
      $content->hidden == 1 ? $result = str_replace('%%HIDDEN%%', 'checked', $result): $result = str_replace('%%HIDDEN%%', '', $result);
      return $result;
  }
}
