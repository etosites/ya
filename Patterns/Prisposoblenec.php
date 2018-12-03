<?php //просто создает объекты разных классов, приспасабливаясь, исходя из того, что в него пришло.

// "FlyweightFactory"
class CharacterFactory
{
	private $characters = array('A','B','Z');
	public function GetCharacter($key)
	{
		// Uses "lazy initialization"
		if (!array_key_exists($key, $this->characters))
		{
			switch ($key)
			{
				case 'A': $this->characters[$key] = new CharacterA(); break;
				case 'B': $this->characters[$key] = new CharacterB(); break;
				//...
				case 'Z': $this->characters[$key] = new CharacterZ(); break;
			}
		}
		return $this->characters[$key];
	}
}

// "Flyweight"
abstract class Character
{
	protected $symbol;
	protected $pointSize;

	public abstract function Display($pointSize);
}

// "ConcreteFlyweight"

class CharacterA extends Character
{
	// Constructor
	public function __construct()
	{
		$this->symbol = 'A';

	}

	public function Display($pointSize)
	{
		$this->pointSize = $pointSize;
		print ($this->symbol." (pointsize ".$this->pointSize.")<br>");
	}
}

// "ConcreteFlyweight"

class CharacterB extends Character
{
	// Constructor
	public function __construct()
	{
		$this->symbol = 'B';
	}

	public function  Display($pointSize)
	{
		$this->pointSize = $pointSize;
		print($this->symbol." (pointsize ".$this->pointSize.")<br>");
	}

}

// ... C, D, E, etc.

// "ConcreteFlyweight"

class CharacterZ extends Character
{
	// Constructor
	public function __construct()
	{
		$this->symbol = 'Z';
	}

	public function  Display($pointSize)
	{
		$this->pointSize = $pointSize;
		print($this->symbol." (pointsize ".$this->pointSize.")<br>");
	}
}

$document="AAZZBBZBA";
// Build a document with text
$chars=str_split($document);
echo '<pre>';
print_r($chars);

$f = new CharacterFactory();

// extrinsic state
$pointSize = 0;

// For each character use a flyweight object
foreach ($chars as $key) {
	$pointSize++;
	$character = $f->GetCharacter($key);
	$character->Display($pointSize);
}

?>
