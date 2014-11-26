<?php
  $this->assign('title', __('Search'));
?>

<div class="container">
  <?php echo $this->Form->create('Search'); ?>
  <fieldset>
    <?php
      echo $this->Form->input('title', array('label' => __('Title')));
      echo $this->Form->input('author', array('label' => __('Author')));
    ?>
  </fieldset>
  <?php echo $this->Form->end(array('label' => __('Search'))); ?>
</div>
