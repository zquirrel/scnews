<div class="title">
  <div class="btn-group pull-right">
    <a class="btn" href="<?=$this->module('catalog/new')?>">新建栏目</a>
  </div>
  <div class="pull-left text">栏目管理</div>
  <div class="clearfix"></div>
</div>
<div class="content">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>栏目名</th>
        <th>标示路径</th>
        <th width="32">操作</th>
      </tr>
    </thead>
    <tbody>
<?php tpl::begin() ?>
      <tr>
        <td><a href="<?=$this->module('catalog/list')?>?catalog=$path">$name</a></td>
        <td>
          $path
        </td>
        <td>
          <a href="<?=$this->module('catalog/edit')?>?catalog=$path"><i class="icon-edit"></i></a>
          <a href="<?=$this->module('catalog/del')?>?catalog=$path"><i class="icon-remove"></i></a>
        </td>
      </tr>
<?php tpl::end('list-item') ?>
<?php catalog::echoAll('list-item'); ?>
    </tbody>
  </table>
</div>
