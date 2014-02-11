<?php
/**
 *@fileoverview: [群博客] 数据库配置
 *@author: 辛少普 <shaopu@staff.sina.com.cn>
 *@date: Tue Nov 30 01:48:23 GMT 2010
 *@copyright: sina
 */


return array(
    'geopost' => array(
        'connect' => array(
            'master' => array(
                'host' => array(
                    0 => 'localhost:3306'
                ),
                'user' => 'whatshere',
                'pw' => 'cucued',
                'name' => 'whatshere_dev',
            ),
            'slave' => array(
                'host' => array(
                    0 => 'localhost:3306'
                ),
                'user' => 'whatshere',
                'pw' => 'cucued',
                'name' => 'whatshere_dev',
            )
        ),
        'tb_n' => 1,
        'tb_prefix' => 'wh_geopost'
    ),
    'mypost' => array(
        'connect' => array(
            'master' => array(
                'host' => array(
                    0 => 'localhost:3306'
                ),
                'user' => 'whatshere',
                'pw' => 'cucued',
                'name' => 'whatshere_dev',
            ),
            'slave' => array(
                'host' => array(
                    0 => 'localhost:3306'
                ),
                'user' => 'whatshere',
                'pw' => 'cucued',
                'name' => 'whatshere_dev',
            )
        ),
        'tb_n' => 1,
        'tb_prefix' => 'wh_mypost'
    ),
    'idgen' => array(
        'connect' => array(
            'master' => array(
                'host' => array(
                    0 => 'localhost:3306'
                ),
                'user' => 'whatshere',
                'pw' => 'cucued',
                'name' => 'whatshere_dev',
            ),
            'slave' => array(
                'host' => array(
                    0 => 'localhost:3306'
                ),
                'user' => 'whatshere',
                'pw' => 'cucued',
                'name' => 'whatshere_dev',
            )
        ),
        'tb_n' => 1,
        'tb_prefix' => 'wh_idgen'
    ),
);
