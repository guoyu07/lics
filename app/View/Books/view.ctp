<?php
  $authors = $this->Util->joinAuthors($book['Author']);
  $this->assign('title', $book['Book']['title'] . ' – ' . $authors);
  $this->assign('lead', $authors);
?>

<div class="row">
  <?php if ($book['Book']['has_cover']): ?>
    <div class="col-sm-8">
  <?php else: ?>
    <div class="col-sm-12">
  <?php endif; ?>
    <table class="table">
      <tr>
        <th><?php echo __('Title'); ?></th>
        <td><?php echo h($book['Book']['title']); ?></td>
      </tr>
      <tr>
        <th><?php echo count($book['Author']) == 1 ? __('Author') : __('Authors'); ?></th>
        <td><?php echo $this->Util->joinAuthors($book['Author'], '<br>'); ?></td>
      </tr>
      <tr>
        <th><?php echo __('Download'); ?></th>
        <td>
          <?php
            foreach($book['Data'] as $data) {
              echo $this->Html->link($data['format'], array('controller' => 'data', 'action' => 'download', $data['id']), array('class' => $data['format'])) . ' ';
            }
          ?>
        </td>
      </tr>
      <?php if ($book['Tag'] && count($book['Tag'] > 0)): ?>
        <tr>
          <th><?php echo count($book['Tag']) == 1 ? __('Tag') : __('Tags'); ?></th>
          <td><?php echo join(', ', array_map(function($tag) { return $tag['name']; }, $book['Tag'])); ?></td>
        </tr>
      <?php endif; ?>
      <?php if ($book['Book']['pubdate']): ?>
        <tr>
          <th><?php echo __('Publication date'); ?></th>
          <td><?php echo substr(h($book['Book']['pubdate']), 0, 4); ?></td>
        </tr>
      <?php endif; ?>
      <?php if ($book['Language'] && count($book['Language'] > 0)): ?>
        <tr>
          <th><?php echo count($book['Language']) == 1 ? __('Language') : __('Languages'); ?></th>
          <td><?php echo join(', ', array_map(function($lang) { return __('iso639-2_' . $lang['lang_code']); }, $book['Language'])); ?></td>
        </tr>
      <?php endif; ?>
      <?php if ($book['Comment'] && $book['Comment']['text'] !== NULL): ?>
        <tr>
          <th><?php echo __('Comments'); ?></th>
          <td><?php echo h(strip_tags($book['Comment']['text'])); ?></td>
        </tr>
      <?php endif; ?>
    </table>
  </div>
  <?php if ($book['Book']['has_cover']): ?>
    <div class="col-sm-4">
      <img src="<?php echo $this->Html->url(array('action' => 'coverImage', $book['Book']['id'])); ?>" class="cover img-rounded">
    </div>
  <?php endif; ?>
</div>

<?php // echo '<hr><h1>DEBUG</h1><pre>'; var_dump($book); echo '</pre>'; ?>
