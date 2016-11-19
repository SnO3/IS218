
<?php

class Shipper
{
	private static $inst;
	private static $shipped = 0;

	public static function getInstance()
	{
		if (!isset(self::$inst)) {
            self::$inst = new self();
        }
        return self::$inst;

	}

	public function ship()
	{
		self::$shipped++;
	}

	public function getShipped()
	{
		return self::$shipped;
	}

	private function __construct(){}
}
	
abstract class AbstractComputerFactory
{
	abstract function makeComputer();
}

class PCFactory extends AbstractComputerFactory 
{
	function makeComputer()
	{
		return new PC();
	}
}

class MacFactory
{
	function makeComputer()
	{
		return new Mac();
	}
}

abstract class Computer
{
	private $make;
	private $model;
	public  $OS; 
	abstract function getMake();
	abstract function getModel();
	abstract function getOS();
	abstract function __clone();
}

class PC extends Computer
{
	//private $make;
	//private $model;
	//private $OS;
	private static $switcher = TRUE;

	function __construct()
	{
		if(self::$switcher){
			$this->make = 'HP';
			$this->model = 'ENVY-17z';
			$this->OS = 'Windows 8.1';
			self::$switcher = FALSE;
		} else
		{
			$this->make = 'Dell';
			$this->model = 'XPS 13';
			$this->OS = 'Windows 10';
			self::$switcher = TRUE;
		}
	}

	function getMake() { return $this->make;  }
	function getModel(){ return $this->model; }
	function getOS()   { return $this->OS;    }
	function __clone(){}
}

class Mac extends Computer
{
	//private $make = 'Apple';
	//private $model;
	//private $OS;
	private static $switcher = TRUE;

	function __construct()
	{
		$this->make = 'Apple';

		if(self::$switcher){
			$this->model = 'iMac';
			$this->OS = 'OS X Sierra';
			self::$switcher = FALSE;
		} else
		{
			$this->model = 'MacBook Air';
			$this->OS = 'OS X Yosemite';
			self::$switcher = TRUE;
		}
	}

	function getMake() { return $this->make;  }
	function getModel(){ return $this->model; }
	function getOS()   { return $this->OS;    }
	function __clone(){}
}

$ShipperInst = Shipper::getInstance();

echo 'Testing PC Factory' . "\n";
$ComputerFactory = new PCFactory;
tester($ComputerFactory, $ShipperInst);
echo "\n\n";

//echo 'Get another PC' . "\n";
//$ComputerFactory

echo 'Testing Mac Factory' . "\n";
$ComputerFactory = new MacFactory;
tester($ComputerFactory, $ShipperInst);
echo "\n\n";

//echo 'Get another Mac' . "\n";


echo 'Computers Shipped: ' . $ShipperInst->getShipped();
echo "\n";

function tester($CompFact, $ShipperInst)
{
	echo 'Computer 1: ' . "\n";
	$CompOne = $CompFact->makeComputer();
	$ShipperInst->ship();
	echo 'Make: '  . $CompOne->getMake()  . "\n";
	echo 'Model: ' . $CompOne->getModel() . "\n";
	echo 'OS: '    . $CompOne->getOS()    . "\n";
	echo "\n";

	echo 'Computer 2: ' . "\n";
	$CompTwo = $CompFact->makeComputer();
	$ShipperInst->ship();
	echo 'Make: '  . $CompTwo->getMake()  . "\n";
	echo 'Model: ' . $CompTwo->getModel() . "\n";
	echo 'OS: '    . $CompTwo->getOS()    . "\n";
	echo "\n";

	echo 'Computer 3: (Copy of Computer One with linux instead)' . "\n";
	$CompThree = clone $CompOne;
	$CompThree->OS = 'Linux';
	echo 'Make: '  . $CompThree->getMake()  . "\n";
	echo 'Model: ' . $CompThree->getModel() . "\n";
	echo 'OS: '    . $CompThree->getOS()    . "\n";	

}

?>