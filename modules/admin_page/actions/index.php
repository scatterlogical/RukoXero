<?php

switch($app_module_action)
{
  case 'send':
    $alerts->add(db_prepare_input($_POST['message']));
    redirect_to('hello/my_page/index');
  break;
}  