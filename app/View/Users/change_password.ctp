<?php
  $this->assign('title', __('Change password'));
?>

<div class="container">
  <?php echo $this->Form->create('User'); ?>
  <fieldset>
    <?php
      echo $this->Form->input('password', array('label' => __('Password')));
      echo $this->Form->input('password_confirm', array('label' => __('Password (confirm)'), 'type' => 'password'));
    ?>
  </fieldset>
  <?php echo $this->Form->end(array('label' => __('Change password'))); ?>
</div>
