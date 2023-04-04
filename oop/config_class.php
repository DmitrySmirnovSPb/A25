<?php
abstract class Config {

    static protected function SSL(){
      $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'? 'https' : 'http';
      if($_SERVER["SERVER_PORT"] == 443)
        $protocol = 'https';
      elseif (isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1')))
        $protocol = 'https';
      elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on')
        $protocol = 'https';
      return $protocol.'://';
    }
  
    static public function SiteName(){return 'lucky-landing.ru';}
    static public function SiteHost(){return $_SERVER['SERVER_NAME'];}
    static public function SiteRoot(){return $_SERVER['DOCUMENT_ROOT'].'/';}
    static public function Address(){return self::SSL().self::SiteHost().'/';}
    static public function Home(){return '<p><a href = "/">Главная</a></p>'."\n";}

    static public function DirImg(){return self::Address().'images/';}
    static public function DirIcon(){return self::Address().'favicon/';}
    static public function DirJS(){return self::Address().'js/';}
    static public function DirCSS(){return self::Address().'styles/';}
    static public function DirFonts(){return self::SiteRoot().'fonts/';}
    static public function DirEmails(){return self::SiteRoot().'tmpl/emails/';}
    static public function DirTmpl(){return self::SiteRoot().'tmpl/';}

}

?>