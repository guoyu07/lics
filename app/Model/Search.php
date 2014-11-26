<?php

App::uses('AppModel', 'Model');

class Search extends AppModel {

  public $useTable = false;

  public $validate = array(
    'title' => array(
      'required' => false,
      'rule' => array('minLength', '3'),
      'message' => 'Title must be at least three characters long',
    ),
    'author' => array(
      'allowEmpty' => true,
      'rule' => array('minLength', '3'),
      'message' => 'Author must be at least three characters long',
    ),
  );
}

?>
