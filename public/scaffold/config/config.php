<?php

//path config
return  [
    'Controller' => dirname(dirname(dirname(__DIR__))) . '/app/Http/Controllers/Page/',             //Controller路径
    'Module'     => dirname(dirname(dirname(__DIR__))) . '/app/Module/',                            //Modules路径
    'Model'      => dirname(dirname(dirname(__DIR__))) . '/app/Model/',                             //Models路径
    'Tpl'        => dirname(dirname(dirname(__DIR__))) . '/app/Module/Tpl/',                        //Tpl路径
    'Ajax'       => dirname(dirname(dirname(__DIR__))) . '/app/Http/Controllers/Ajax/',             //ajax路径
    'AjaxRoute'  => dirname(dirname(dirname(__DIR__))) . '/app/Http/Route/Ajax/routes.php',       //ajax route
    'PageRoute'  => dirname(dirname(dirname(__DIR__))) . '/app/Http/Route/Page/routes.php',       //page route
    'author'     => 'jeanku'
];