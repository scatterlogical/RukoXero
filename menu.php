<?php

//Only admin will see this link
if($app_user['group_id']==0)
{
  $app_plugin_menu['menu'][] = array('title'=>'XeroAPI Administration','url'=>url_for('rukoxero/admin_page/index'),'class'=>'fa-balance-scale');
}
