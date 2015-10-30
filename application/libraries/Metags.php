<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Metags {

  public function head($title_page = null, $key_page = null, $description_page = null, $styles = array())
  {
    $title_page = ($title_page == null) ? "{pode vir do banco ou manual}" : $title_page;
    $key_page = ($key_page == null) ? "{pode vir do banco ou manual}" : $key_page;
    $description_page = ($description_page == null) ? "{pode vir do banco ou manual}" : $description_page;

    $head = array(
      "title_page"       => "{$title_page}",
      "key_page"         => "{$key_page}",
      "description_page" => "{$description_page}",
      "styles"           => $styles,
    );

    return $head;
  }

  public function scripts($scripts = array(), $scripts_outhers = array())
  {
    $scripts = array(
      "scripts" => $scripts,
      "scripts_outhers" => $scripts_outhers,
    );

    return $scripts;
  }

  public function bread_path($linkPai, $nomePai, $nomeFilho)
  {
    $linkPai = base_url($linkPai);
    return "<a href='{$linkPai}' class='link'>{$nomePai}</a> &#9654; {$nomeFilho}";
  }

}