<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $page = array();
  $page['title'] = $_POST['title'];
  $page['author_id'] = $_POST['author'];
  $page['content'] = $_POST['content'];
  $page['catalog_id'] = $_POST['catalog'];
  if (\model\page::save($page) > 0) {
    echo '<div class="alert alert-info">成功发表！</div>';
  } else {
    echo '<div class="alert alert-error">出错了！</div>';
  }
} 
?>
<div class="title">
  编辑新文章
</div>
<div class="content">
  <form class="form-horizontal editor" method="POST">
    <div class="control-group">
      <label class="control-label" for="title">标题：</label>
      <div class="controls">
        <input type="text" id="title" name="title" class="span6" />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="author">作者：</label>
      <div class="controls">
        <input type="text" id="author" name="author" class="span6" />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="catalog">分类：</label>
      <div class="controls">
        <select name="catalog" class="span6">
          <?php tpl::begin() ?>
          <option value="$path">$name</option>
          <?php tpl::end('catalog-list-item') ?>
          <?php catalog::echoOthers('catalog-list-item') ?>
          <option value="<?=catalog::id()?>" selected="selected"><?=catalog::name()?></option>
        </select>
      </div>
    </div>
    <div class="control-group">
      <textarea id="content" name="content"></textarea>
    </div>
    <div class="control-group">
      <div class="controls">
        <button class="btn btn-primary" type="submit">提交</button>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript" charset="utf-8" src="<?=$base?>/vendor/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(function () {
  CKEDITOR.replace('content', {
    language: 'zh-cn',
    filebrowserBrowseUrl: '<?=$base?>/vendor/kcfinder/browse.php?type=files',
    filebrowserImageBrowseUrl: '<?=$base?>/vendor/kcfinder/browse.php?type=images',
    filebrowserUploadUrl:'<?=$base?>/kcfinder/upload.php?type=files',
    filebrowserImageUploadUrl: '<?=$base?>/kcfinder/upload.php?type=images',
    filebrowserFlashUploadUrl: '<?=$base?>/kcfinder/upload.php?type=flash'
  });
});
</script>
