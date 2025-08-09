# Jc_MultiDBConnection Magento 2 module

Module for demonstrating multiple DB ResourceConnections based on the request header : JC-X-WEBSITE-ID

## Steps to configure (sample configuration):

1. Configure mapping for website ids with resources in env.php
    ```php
        'jc_x_website_id' => [
            'usa_website' => [
                'resource' => 'website1_resource'
            ],
            'uk_website' => [
                'resource' => 'website2_resource'
            ]
        ],
    ```
2. Configure mapping for resources with connections in env.php
    ```php
        'resource' => [
            'default_setup' => [
                'connection' => 'default'
            ],
            'website1_resource' => [
                'connection' => 'website1_connection'
            ],
            'website2_resource' => [
                'connection' => 'website2_connection'
            ]
        ],
    ```
3. Configure connections under db in env.php
    ```php
        'db' => [
            'table_prefix' => '',
            'connection' => [
                'default' => [
                    'host' => 'db',
                    'dbname' => 'magento',
                    'username' => 'magento',
                    'password' => 'magento',
                    'model' => 'mysql4',
                    'engine' => 'innodb',
                    'initStatements' => 'SET NAMES utf8;',
                    'active' => '1'
                ],
                'website1_connection' => [
                    'host' => 'db1',
                    'dbname' => 'magento',
                    'username' => 'magento',
                    'password' => 'magento',
                    'model' => 'mysql4',
                    'engine' => 'innodb',
                    'initStatements' => 'SET NAMES utf8;',
                    'active' => '1'
                ],
                'website2_connection' => [
                    'host' => 'db2',
                    'dbname' => 'magento',
                    'username' => 'magento',
                    'password' => 'magento',
                    'model' => 'mysql4',
                    'engine' => 'innodb',
                    'initStatements' => 'SET NAMES utf8;',
                    'active' => '1'
                ]
            ],
    ```
