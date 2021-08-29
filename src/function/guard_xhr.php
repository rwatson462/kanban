<?php

function guard_xhr( string $message = '')
{
   http_response_code(400);
   echo $message;
   exit;
}
