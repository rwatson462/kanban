<?php

require dirname(__DIR__).'/config/template_config.php';

function template( string $tpl_file, array $data = [] ): void
{
   extract($data);
   $tpl_filename = TemplateRoot . '/' . $tpl_file . '.tpl';
   if( file_exists($tpl_filename)) include $tpl_filename;
   else throw new Exception("Template not found: $tpl_file");
}
