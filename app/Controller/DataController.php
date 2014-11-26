<?php

App::uses('ConnectionManager', 'Model');

class DataController extends AppController {

  public function download($id) {
    if (!$id) {
      throw new NotFoundException(__('Invalid download'));
    }
    $data = $this->Data->findById($id);
    if (!$data) {
      throw new NotFoundException(__('Invalid download'));
    }

    $calibreRoot = dirname(ConnectionManager::getDataSource('default')->config['database']);
    $filename = $data['Data']['name'] . '.' . strtolower($data['Data']['format']);
    $path = $calibreRoot . DS . str_replace('/', DS, $data['Book']['path']) . DS . $filename;

    $this->response->file($path, array('download' => true, 'name' => $filename));
    return $this->response;
  }
}

?>
