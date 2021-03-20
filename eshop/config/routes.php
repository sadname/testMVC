<?php
    return array(
       /*  'eshop' => 'index/index',// */
       'eshop/news/([a-z])/([0-9]+)'=>'news/view', // просмотр определенной новости

        'eshop/news'=>'news/index', // actionIndex в News Controller
        'eshop/product'=>'product/list', //actionList в ProductController
    );
        



?>