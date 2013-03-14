<div class="title">
  <div class="btn-group pull-right">
    <a class="btn" href="<?=$this->module('page/new')?>">新建文章</a>
    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="">投票</a></li>
      <li><a href="">链接</a></li>
    </ul>
  </div>
  <div class="pull-left text">查看文章::<?= catalog::name() ?></div>
  <div class="clearfix"></div>
</div>
<div class="content">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>标题</th>
        <th width="150">日期</th>
        <th width="32">操作</th>
      </tr>
    </thead>
    <tbody>
<?php tpl::begin() ?>
      <tr>
        <td><a href="<?=$export->module('page/edit')?>?page_id=$page_id">$title</a></td>
        <td>
          $create_date
        </td>
        <td>
          <a href="<?=$export->module('page/edit')?>?page_id=$page_id"><i class="icon-edit"></i></a>
          <a href="<?=$export->module('page/del')?>?page_id=$page_id"><i class="icon-remove"></i></a></td>
      </tr>
  <?php tpl::end('list-item') ?>
  <?php catalog::listNews('page',10,'list-item'); ?>
    </tbody>
  </table>
  <?php tpl::begin() ?>
  <div class="pagination pagination-right">
    <ul>
      <li><a href="$prev">&laquo;</a></li>
      <li><span>$curpage / $allpages</span></li>
      <li><a href="$next">&raquo;</a></li>
    </ul>
  </div>
  <?php tpl::end('pagination') ?>
  <?= catalog::pagination('pagination') ?>
</div>

