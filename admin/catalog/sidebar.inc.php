<div class="nav-toolbar">
  <form class="form-inline" method="GET" action="<?=$this->module('catalog/list')?>" >
    <div class="input-append">
      <input type="text" name="catalog" placeholder="栏目ID" class="span2"/>
      <a class="btn">跳转</a>
    </div>
  </form>
</div>
<div class="accordion-inner">
  <table width="100%">
    <?php tpl::begin() ?>
    <tr>
      <td width="95%"><a href="<?=$export->module('catalog/list')?>?catalog=$path">$name</a></td>
      <td><a href="<?=$export->module('page/new')?>?catalog=$path"><i class="icon-edit"></i></a></td>
    </tr>
    <?php tpl::end('test') ?>
    <?php catalog::echoAll('test') ?>
  </table>
</div>
