<?php

function loc() {
  preg_match('/^\/([^\/:.-]+)/', admin::loc(), $matches);
  return $matches[1];
}

$loc = loc();

if (isset($modules[$loc])) {
  $modules[$loc]['in'] = true;
} else {
  $modules[$loc] = array(
    'name'=>$loc, 
    'id'=>'current-mdl',
    'title'=>'当前模块',
    'in'=>true
  );
}

?>          <div class="accordion" id="accordion">
<?php foreach ($modules as $module => $config): ?>
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?=$config['id']?>"><?=$config['title']?></a>
                <a class="act" href="<?=$this->module($config['link'])?>">
                  <i class="icon-arrow-right"></i>
                </a>
              </div>
              <div id="<?=$config['id']?>" class="accordion-body collapse <?=isset($config['in'])?'in':''?>">
                <?php include "$module/sidebar.inc.php" ?>
              </div>
            </div>
<?php endforeach; ?>
          </div>
