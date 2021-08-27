<?php
require dirname(__DIR__).'/config.php';

require_function('template');

template('html_head.tpl', [
   'styles' => ['welcome.css']
]);
template('welcome.tpl');
template('html_foot.tpl');