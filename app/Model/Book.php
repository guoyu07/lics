<?php

App::uses('AppModel', 'Model');

class Book extends AppModel {

  public $hasAndBelongsToMany = array(
    'Author' => array(
      'className' => 'Author',
      'joinTable' => 'books_authors_link',
      'foreignKey' => 'book',
      'associationForeignKey' => 'author',
    ),
    'Tag' => array(
      'className' => 'Tag',
      'joinTable' => 'books_tags_link',
      'foreignKey' => 'book',
      'associationForeignKey' => 'tag',
    ),
    'Language' => array(
      'className' => 'Language',
      'joinTable' => 'books_languages_link',
      'foreignKey' => 'book',
      'associationForeignKey' => 'lang_code',
    ),
  );

  public $hasMany = array(
    'Data' => array(
      'className' => 'Data',
      'foreignKey' => 'book',
    )
  );

  public $hasOne = array(
    'Comment' => array(
      'className' => 'Comment',
      'foreignKey' => 'book',
    ),
  );
}

?>
