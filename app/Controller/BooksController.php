<?php

class BooksController extends AppController {

  public $uses = array('Book', 'Search');

  public $helpers = array('Util');

  public $components = array('Paginator');

  public function index() {
    $this->Paginator->settings = array(
      'group' => 'Book.id',
      'joins' => array(
        array(
          'table' => 'books_authors_link',
          'alias' => 'bal',
          'conditions'=> array('bal.book = Book.id'),
        ),
        array(
          'table' => 'authors',
          'alias' => 'Author',
          'conditions'=> array('Author.id = bal.author'),
        ),
      ),
      'conditions' => array(),
      'order' => array(
        'Book.last_modified' => 'desc'
      ),
      'limit' => 10,
    );
    foreach (array(
      array('query' => 'title', 'column' => 'Book.title'),
      array('query' => 'author', 'column' => 'Author.name'),
    ) as $field) {
      if ($this->request->query($field['query'])) {
        $this->Paginator->settings['conditions'][$field['column'] . ' LIKE'] = '%' . $this->request->query($field['query']) . '%';
      }
    }
    $this->set('books', $this->Paginator->paginate('Book'));
  }

  public function view($id) {
    $this->set('book', $this->getBook($id));
  }

  public function search() {
    if ($this->request->is('post')) {
      $this->Search->set($this->data);
      if($this->Search->validates()) {
        $this->redirect(array(
          'action' => 'index',
          '?' => array(
            'title' => $this->request->data('Search.title'),
            'author' => $this->request->data('Search.author'),
          ),
        ));
      }
    }
  }

  public function coverImage($id) {

    $book = $this->getBook($id);

    $calibreRoot = dirname(ConnectionManager::getDataSource('default')->config['database']);
    $path = $calibreRoot . DS . str_replace('/', DS, $book['Book']['path']) . DS . 'cover.jpg';

    $this->response->modified(filemtime($path));
    $this->response->etag(md5_file($path));
    if ($this->response->checkNotModified($this->request)) {
      return $this->response;
    } else {
      $this->response->file($path);
      return $this->response;
    }
  }

  private function getBook($id) {
    if (!$id) {
      throw new NotFoundException(__('Invalid book'));
    }
    $book = $this->Book->findById($id);
    if (!$book) {
      throw new NotFoundException(__('Invalid book'));
    }
    return $book;
  }

}

?>
