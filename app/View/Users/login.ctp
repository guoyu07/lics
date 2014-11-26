<div class="container">
  <?php echo $this->Form->create('User'); ?>
  <fieldset>
    <?php
      echo $this->Form->input('username', array('label' => __('Username')));
      echo $this->Form->input('password', array('label' => __('Password')));
    ?>
  </fieldset>
  <?php echo $this->Form->end(array('label' => __('Login'))); ?>
</div>
