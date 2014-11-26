<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

  public $useDbConfig = 'lics';

  public $validate = array(
    'username' => array(
      'rule' => array('minLength', '3'),
      'message' => 'Username must be at least three characters long',
    ),
    'password' => array(
      'rule' => array('minLength', '3'),
      'message' => 'Password must be at least six characters long',
    ),
    'password_confirm' => array(
      'rule' => 'password_match',
      'message' => 'Passwords did not match',
    ),
  );

  public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
      $passwordHasher = new BlowfishPasswordHasher();
      $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
    }
    return true;
  }

  public function password_match() {
    return strcmp($this->data['User']['password'], $this->data['User']['password_confirm']) == 0;
  }
}

?>
