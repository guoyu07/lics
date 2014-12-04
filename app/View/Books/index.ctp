<?php $this->start('navbar'); ?>
<li><?php echo __('Home'); ?></li>
<?php $this->end(); ?>

<?php $this->assign('title', __('Books')); ?>

<?php
$this->start('pagination');
echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a', 'escape' => false));
echo $this->Paginator->numbers(array(
  'separator' => '',
  'currentTag' => 'a',
  'currentClass' => 'active',
  'tag' => 'li',
  'first' => 1,
  'modulus' => 2,
  'last' => 0,
  'ellipsis' => '<li class="disabled"><a>...</a></li>'
));
echo $this->Paginator->next('&raquo;', array('tag' => 'li','currentClass' => 'disabled', 'escape' => false), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a', 'escape' => false));
$this->end();
?>

<div class="panel panel-default">
  <div class="panel-heading">
    <div class="pagination pagination-large">
      <ul class="pagination">
        <?php echo $this->fetch('pagination'); ?>
      </ul>
    </div>
  </div>
  <div class="list-group books panel-body">
    <?php
      if (!$books):
    ?>
      <div class="row">
        <div class="col-xs-12">
          <p class="text-center">
            <em><?php echo __('There are no books to display.'); ?></em>
          </p>
        </div>
      </div>
    <?php
      endif;
      foreach ($books as $book):
    ?>
      <a href="<?php echo $this->Html->url(array('action' => 'view', $book['Book']['id'])); ?>" class="list-group-item">
        <div class="row">
          <div class="col-xs-2 col-lg-1"><img src="<?php echo $this->Html->url(array('action' => 'coverImage', $book['Book']['id'])); ?>" class="cover img-rounded"></div>
          <div class="col-xs-10 col-lg-11">
            <h4 class="list-group-item-heading nowrap"><?php echo $book['Book']['title']; ?></h4>
            <p class="list-group-item-text nowrap"><?php echo $this->Util->joinAuthors($book['Author']); ?></p>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
  <div class="panel-footer">
    <div class="pagination pagination-large">
      <ul class="pagination">
        <?php echo $this->fetch('pagination'); ?>
      </ul>
    </div>
  </div>
</div>
