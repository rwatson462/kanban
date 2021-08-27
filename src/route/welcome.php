<?php
require_function('template');

template('html_head', [
   'styles' => ['welcome.css']
]);
template('welcome');
template('html_foot');