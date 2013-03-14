<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $page = array();
  $page['title'] = $_POST['title'];
  $page['author_id'] = $_POST['author'];
  $page['content'] = $_POST['content'];
  $page['catalog_id'] = $_POST['catalog'];
  if (\model\page::update($_POST['page_id'], $page) > 0) {
    echo '<div class="alert alert-info">成功编辑！</div>';
  } else {
    echo '<div class="alert alert-error">出错了！</div>';
    return;
  }
} 
?>
<div class="title">
  编写新文章
</div>
<div class="content">
  <form class="form-horizontal editor" method="POST">
    <?php tpl::begin() ?>
    <input type="hidden" name="page_id" value="$page_id" />
    <div class="control-group">
      <label class="control-label" for="title">标题：</label>
      <div class="controls">
        <input type="text" id="title" class="span6" name="title" value="$title" />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="author">作者：</label>
      <div class="controls">
      <input type="text" id="author" class="span6" name="author" value="<?=$_SESSION['user']['name']?>" />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="catalog">分类：</label>
      <div class="controls">
        <select name="catalog" class="span6">
          <?php tpl::begin() ?>
          <option value="$path">$name</option>
          <?php tpl::end('catalog-list-item') ?>
          <?php catalog::echoOthers(page::catalog('path')) ?>
          <option value="$catalog_id"><?=page::catalog('name')?></option>
        </select>
      </div>
    </div>
    <div class="control-group">
      <textarea id="content" name="content">$content</textarea>
    </div>
    <?php tpl::end('page') ?>
    <?php page::content('page') ?>
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
