
<?php

/*
Observer
Strategy
Prototype
*/

class ButtonContext
{
	private $strategy = NULL;

	public function __construct($id)
	{
		switch($id)
		{
			case 'A':
				$this->strategy = new TriangleStrategy();
				break;
			case 'B':
				$this->strategy = new SquareStrategy();
				break;
			case 'C':
				$this->strategy = new CircleStrategy();
				break;

		}
	}

	public function changeType(AbstractButton $button)
	{
		return $this->strategy->changeType($button);
	}
}

interface ButtonStrategy
{
	public function changeType(AbstractButton $b);
}

class TriangleStrategy implements ButtonStrategy
{
	public function changeType(AbstractButton $button)
	{
		$button->setType('Triangle');
	}
}
class SquareStrategy implements ButtonStrategy
{
	public function changeType(AbstractButton $button)
	{
		$button->setType('Square');
	}
}
class CircleStrategy implements ButtonStrategy
{
	public function changeType(AbstractButton $button)
	{
		$button->setType('Circle');
	}
}

abstract class AbstractObserver
{
	abstract function update(AbstractButton $button_in);
}

abstract class AbstractButton
{
	abstract function attach(AbstractObserver $obs);
	abstract function notify();
}

class ButtonObserver extends AbstractObserver
{
	public function __construct(){}

	public function update(AbstractButton $button)
	{
		echo $button->getName() . ' button Boolean equals ';

		if($button->getValue())
			echo 'True' . "\n";
		else
			echo 'False' . "\n";

		echo $button->getName() . ' button type equals ' . $button->getType() . "\n";
		
	}
}

class Button extends AbstractButton
{
	private $name;
	private $value = FALSE;
	private $type;
	private $observers = array();

	public function __construct($name, $type)
	{
		$this->name = $name;
		$this->type = $type;
	}

	public function attach(AbstractObserver $obs)
	{
		array_push($this->observers, $obs);
	}

	public function notify()
	{
		foreach( $this->observers as $o )
		{
			$o->update($this);
		}
	}

	public function press()
	{
		$this->value = !$this->value;
		$this->notify();
	}

	public function setType($t)
	{
		$this->type = $t;
		$this->notify();
	}

	public function getValue()  { return $this->value; }
	public function getName()   { return $this->name;  }
	public function getType()   { return $this->type;  }
	public function __clone(){}

}

class ButtonTypes
{
	private static $inst;
	const SQUARE = 'Square';

	public static function getInstance()
	{
		if (!isset(self::$inst)) {
            self::$inst = new self();
        }
        return self::$inst;

	}

	private function __construct(){}
}


$observer    = new ButtonObserver();
$startButton = new Button('Start', ButtonTypes::SQUARE);

$stratA = new ButtonContext('A');
$stratB = new ButtonContext('B');
$stratC = new ButtonContext('C');

$startButton->attach($observer);

echo 'Pressing button twice:' . "\n\n";

$startButton->press();
$startButton->press();
echo "\n";

echo 'Changing types: ' . "\n\n";

$stratA->changeType($startButton);
echo "\n";
$stratB->changeType($startButton);
echo "\n";
$stratC->changeType($startButton);


?>