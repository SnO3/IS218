#!/usr/bin/php
<?php

interface MealBuilderInterface
{
	public function setMealNum($n);
	public function setMealSize($s);
}

class MealBuilder implements MealBuilderInterface
{
	private $meal;

	public function __construct()
	{
		$this->meal = new Meal();
	}

	public function setMealNum($num)
	{
		$this->meal->mealNum = $num;
	}
	
	public function setMealSize($size)
	{
		$this->meal->mealSize = $size;
	}

	public function compile()
	{
		if($this->meal->mealNum === 1)
		{	
			$TBF = new TurkeyBurgerFactory();
			$this->meal->contents = array($TBF->makeBurger(), $this->meal->mealSize . ' Fries', $this->meal->mealSize . ' Drink');
		} else
		{
			$BBF = new BeefBurgerFactory();
			$this->meal->contents = array($BBF->makeBurger(), $this->meal->mealSize . ' Fries', $this->meal->mealSize . ' Drink');
		}
	}

	public function getMeal()
	{
		return $this->meal;
	}


}

class MealDirector
{
	public function build(MealBuilderInterface $builder, $num, $size)
	{
		$builder->setMealNum($num);
		$builder->setMealSize($size);
		$builder->compile();

		return $builder->getMeal();

	}
}

class Meal
{
	public $mealNum;
	public $mealSize;
	public $contents;

}

abstract class AbstractBurgerFactory
{
	abstract function makeBurger();
}

class TurkeyBurgerFactory extends AbstractBurgerFactory
{
	function makeBurger()
	{
		return new TurkeyBurger();
	}
}

class BeefBurgerFactory extends AbstractBurgerFactory
{
	function makeBurger()
	{
		return new BeefBurger();
	}
}

abstract class Burger
{
	private $ingredients;

	abstract function getIngredients();
}

class TurkeyBurger extends Burger
{

	function __construct()
	{
		$this->ingredients = array('Turkey', 'Lettuce', 'Tomato', 'Mayo', 'Bread');
	}
	
	function getIngredients()
	{
		return $this->ingredients;
	}
}

class BeefBurger extends Burger
{
	function __construct()
	{
		$this->ingredients = array('Beef', 'Lettuce', 'Tomato', 'Mayo', 'Bread');
	}
	
	function getIngredients()
	{
		return $this->ingredients;
	}
}

$Cashier = new MealDirector();
$FryCook = new MealBuilder();

echo 'Can I get meal number 1, Medium?' . "\n";
$meal = $Cashier->build($FryCook, 1, 'Medium');
getOrderValues($meal);

echo "\n";
echo 'Can I get meal number 2, Large?' . "\n";
$meal = $Cashier->build($FryCook, 2, 'Large');
getOrderValues($meal);

function getOrderValues($m)
	{
	echo 'Burger:';
	foreach ($m->contents[0]->getIngredients() as $x) {
		echo ' ' . $x;
	}
	echo "\n";
	for($i = 1; $i < 3; $i++)
	{
		echo $m->contents[$i];
		echo "\n";
	}
}

?>