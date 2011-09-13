<?php
function joinPath($dir1, $dir2) {
    return realpath($dir1 . DIRECTORY_SEPARATOR . $dir2);
}
 
$homePath = dirname(__FILE__) . '/../..';
$protectedPath = joinPath($homePath, 'protected');
$webrootPath = joinPath($homePath, 'public-html');
$runtimePath = joinPath($homePath, 'runtime');

return array(
	'basePath' => $protectedPath,
	'runtimePath' => $runtimePath,
	'name'=>'xxx',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'B5b251a',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=fcuk-fragrance;unix_socket=/opt/local/var/run/mysql5/mysqld.sock',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				array(
					'class' => 'CWebLogRoute',
					'levels' => 'trace',
					'categories' => 'vardump',
					'showInFireBug' => true
				),
			),
		),
		//Configure SASS/SCSS Asset Manager:
		'assetManager' => array(
			'class' => 'application.extensions.phamlp.PBMAssetManager',
		    'parsers' => array(
		    	'sass' => array( 
		        	'class' => 'application.extensions.phamlp.Sass',
		        	'output' => 'css',
		        	'options' => array()
		     	),
		      	'scss' => array(
		      		'class' => 'application.extensions.phamlp.Sass',
		        	'output' => 'css',
		        	'options' => array()
		      	),
		    )
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'xxx@xxx.com',
		'siteTitle' => 'xxx',
		'facebook' => array(
			'appId' => 'xxx',
			'apiKey' => 'xxx',
			'secretKey' => 'xxx',
			'baseAppUrl' => 'xxx',
			'siteUrl' => 'xxx'
		),
		's3' => array(
			'bucketName' => 'xxx',
			'basePath' => 's3.amazonaws.com/xxx/',
		),
		'googleAnalytics' => array(
			'gaAccount' => 'xxx',
		),
	),
);