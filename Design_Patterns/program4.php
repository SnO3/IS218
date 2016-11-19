#!/usr/bin/php
<?php

class Something
{
	private static $inst;
	public static $MYSUBJECT = 'Computers';

	public static function getInstance()
	{
		if (!isset(self::$inst)) {
            self::$inst = new self();
        }
        return self::$inst;

	}

	private function __construct(){}
}

class NoteBook
{
	private $subject;
	private $owner;
	private $copiedFrom;

	public function __construct($sub, $own)
	{
		$this->subject = $sub;
		$this->owner = $own;
	}

	public function getSubject()    { return $this->subject;            }
	public function getOwner()      { return $this->owner;              }
	public function setOwner($own)  { $this->owner = $own;              }
	public function getCopiedFrom() { return $this->copiedFrom;         }
	public function __clone()       { $this->copiedFrom = $this->owner; }

}

class NoteBookAdapter
{
	private $notebook;
	
	public function __construct($nb)
	{
		$this->notebook = $nb;
	}

	public function praiseOwner($goodName)
	{
		return $this->notebook->getOwner() . ' is a ' . $goodName;
	}
}

$notebook1 = new NoteBook(Something::$MYSUBJECT, 'Bob');
$notebook2 = clone $notebook1;
$notebook2->setOwner('Bill');

echo 'Notebook1: ';
verifyNotebook($notebook1);
echo 'Notebook2: ';
verifyNotebook($notebook2);

$adapter = new NoteBookAdapter($notebook1);
echo $adapter->praiseOwner('Legend') . "\n";

function verifyNotebook($n)
{
	if( $n->getCopiedFrom() == NULL )
	{
		echo 'This is the Original and is owned by ' . $n->getOwner() . "\n";
	} else
	{
		echo 'Notebook is copied from ' . $n->getCopiedFrom() . ' and is owned by ' . $n->getOwner() . "\n";
	}
}

?>