<?php

require_function(['template','db_connect']);

$db = db_connect();


template('html_head', ['page_title', 'Settings']);
template('settings');
template('html_foot');
