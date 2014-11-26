<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

  public $layout = 'login';

  public function login() {
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        return $this->redirect($this->Auth->redirect());
      }
      $this->Session->setFlash(__('Invalid username or password. Please try again.'), 'error');
    }
  }

  public function logout() {
    return $this->redirect($this->Auth->logout());
  }

  public function changePassword() {
    $this->layout = 'default';
    if ($this->request->is('post')) {
      $this->User->id = $this->Auth->user('id');
      $this->User->set($this->data);
      if($this->User->validates()) {
        if ($this->User->save($this->request->data)) {
          $this->Session->setFlash(__('The password has been successfully changed.'), 'success');
          return $this->redirect(array('controller' => 'books', 'action' => 'index'));
        }
        $this->Session->setFlash(__('The password could not be changed. Please try again.'), 'error');
      }
    }
  }
}

?>
