<?php

App::uses('AppModel', 'Model');

class Data extends AppModel {

  public $belongsTo = array(
    'Book' => array(
      'className' => 'Book',
      'foreignKey' => 'book',
    ),
  );
}

?>
