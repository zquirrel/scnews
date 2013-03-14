<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $catalog = array();
  $catalog['name'] = $_POST['name'];
  $catalog['path'] = $_POST['path'];
  if (\model\catalog::update($catalog, $_POST['id']) > 0) {
    echo '<div class="alert alert-info">成功发表！</div>';
  } else {
    echo '<div class="alert alert-error">出错了！</div>';
  }
} 
?>
<div class="title">
  编辑栏目
</div>
<div class="content">
  <form class="form-horizontal" method="POST">
    <input type="hidden" name="id" value="<?=catalog::id()?>" />
    <div class="control-group">
      <label class="control-label" for="name">栏目名：</label>
      <div class="controls">
      <input type="text" id="name" name="name" value="<?=catalog::name() ?>" class="span6" />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="path">标示路径：</label>
      <div class="controls">
      <input type="text" id="path" name="path" class="span6" value="<?=catalog::id()?>" />
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <button class="btn btn-primary" type="submit">提交</button>
      </div>
    </div>
  </form>
</div>

