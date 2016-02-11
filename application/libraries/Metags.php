<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Metags {

  public function head($title_page = null, $key_page = null, $description_page = null, $styles = array())
  {
    /*
    $title_page = ($title_page == null) ? "{pode vir do banco ou manual}" : $title_page;
    $key_page = ($key_page == null) ? "{pode vir do banco ou manual}" : $key_page;
    $description_page = ($description_page == null) ? "{pode vir do banco ou manual}" : $description_page;
    */

    $head = array(
      "title_page"       => "{$title_page}",
      "key_page"         => "{$key_page}",
      "description_page" => "{$description_page}",
      "styles"           => $styles,
    );

    return $head;
  }

  public function footer_scripts($scripts_local = array(), $scripts_externo = array())
  {
    $scripts = array(
      "local" => $scripts_local,
      "externo" => $scripts_externo,
    );

    return $scripts;
  }

  public function bread_path($dados = array())
  {
    $valores;
    foreach ($dados as $key => $value) {
      if( $value == null)
        $valores[$key] = "<a>$key</a>";
      else
        $valores[$key] = "<a href='$value'>$key</a>";
    }
    return $valores;
  }

}