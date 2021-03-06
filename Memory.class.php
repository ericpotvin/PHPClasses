<?php
/**
 * Memory Class [ Memory.class.php ]
 *
 * @package    PHPClasses
 * @subpackage Memory
 * @author     Eric Potvin
 * @link       https://github.com/ericpotvin/phpclasses
 */

if(!class_exists('Memcached')) {
	die('Unable to load module: Memcached');
}

/**
 * Memory class
 * 
 * Memory module class.
 * 
 * @package     PHPClasses
 * @subpackage  Memory
 */
class Memory extends Memcached {

	/**
	 * Core Constructor.
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		$this->addServer("127.0.0.1", 11211);
	}

	/**
	 * deleteAllKeys()
	 * Delete all keys stored
	 */
	public function deleteAllKeys()
	{
		$list = $this->getAllKeys();
		foreach($list as $k => $v) {
			$this->delete($v);
		}
	}

	/**
	 * getKey()
	 * Get the value of a stored key
	 */
	public function getKey($key)
	{
		$key = trim($key);
		return $this->get($line);
	}

	/**
	 * cmd_getKey()
	 * Get the value of a stored key via command line
	 */
	public function cmdGetKey($key)
	{
		fwrite(STDOUT, "Please enter the key: ");
		$line = trim(fgets(STDIN));
		echo "\n";
		echo $this->getKey($line);
		echo "\n";
	}

	/**
	 * cmd_deleteKey()
	 * Delete a stored key via command line
	 */
	public function cmdDeleteKey($key)
	{
		fwrite(STDOUT, "Please enter the key: ");
		$line = trim(fgets(STDIN));
		$this->delete($line);
		echo "\nThe value is now:\n ";
		echo $this->getKey($line);
		echo "\n";
	}

	/**
	 * cmd_flush()
	 * Delete everything!
	 */
	public function cmdFlush()
	{
		$result = $mc->flush();
		echo "\n";
		var_dump($result);
		echo "\n";
	}

}
