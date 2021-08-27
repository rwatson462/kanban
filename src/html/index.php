<?php

include dirname(__DIR__).'/config.php';

template('html_head.tpl', [
   'styles' => ['welcome.css']
]);
template('welcome.tpl');
template('html_foot.tpl');