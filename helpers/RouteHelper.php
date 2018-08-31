<?php
/**
 *
 */
 class RouteHelper
 {
   const CLASS_SUFFIX = "Controller";
   /**
    * Get the URI and format it
    * Output: Two Strings , a class name and a method name
    */
   static public function getRoute()
   {
     $baseURI = $_SERVER["REQUEST_URI"];
     $baseURI = substr($baseURI, 1);
     $uris = explode('/', $baseURI);
     $uris[0] = $uris[0] . self::CLASS_SUFFIX;
     if(count($uris) !== 2) {
        throw new \Exception("Error formating route");
    }
     self::executeAction($uris);
   }

   static private function executeAction($uris)
   {
     //@TODO catch feature exception comming from autloader
     ucfirst($uris[0])::{$uris[1]}();
     //On va executer la methode du controller
     //et afficher le résultat
   }
 }
