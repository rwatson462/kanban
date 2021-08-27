<?php

require dirname(__DIR__).'/config/template_config.php';

function template( string $tpl_file, array $data = [] ): void
{
   extract($data);
   include TemplateRoot . '/' . $tpl_file;
}
