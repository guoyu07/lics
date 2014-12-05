<?php
/**
*
*
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.Config
* @since         CakePHP(tm) v 0.2.9
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

define('SAMPLEDB', APP . 'Data' . DS . 'samplelib' . DS . 'metadata.db');
define('LICSDB', APP . 'Data' . DS . 'lics.sqlite3');

class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Sqlite',
		'persistent' => false,
		'host' => 'localhost',
		// 'database' => '/full/path/to/metadata.db',
		'database' => SAMPLEDB,
	);

	public $lics = array(
		'datasource' => 'Database/Sqlite',
		'persistent' => false,
		'host' => 'localhost',
		'database' => LICSDB,
	);
}
