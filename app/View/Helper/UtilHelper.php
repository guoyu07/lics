<?php

class UtilHelper extends AppHelper {

  public function joinAuthors($authors, $glue = '; ') {
    return join($glue, array_map(function($a) { return str_replace('|', ',', $a['name']); }, $authors));
  }
}

?>
