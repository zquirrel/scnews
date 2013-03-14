<?php if (\model\catalog::remove($_GET['catalog']) > 0): ?>
<div class="alert alert-info">
  成功发表！
</div>
<?php else: ?>
<div class="alert alert-warning">
  错误！
</div>
<?php endif; ?>
