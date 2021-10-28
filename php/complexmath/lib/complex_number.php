<?
namespace ComplexMath;

use \Bitrix\Main\ArgumentTypeException;

class ComplexNumber {
	private $real;
	private $imaginary;
	
	function __construct($real, $imaginary = 0) {
		if (!is_numeric($real)) throw new ArgumentTypeException("real", "numeric");
		if (!is_numeric($imaginary)) throw new ArgumentTypeException("imaginary", "numeric");
		if (is_infinite($real)) $imaginary = 0;
		$this->real = $real;
		$this->imaginary = $imaginary;
	}
	
	public function add($real, $imaginary = 0) {
		$c = self::toComplex($real, $imaginary);
		return new self($this->real + $c->real, $this->imaginary + $c->imaginary);
	}
	
	public function subtract($real, $imaginary = 0) {
		$c = self::toComplex($real, $imaginary);
		return new self($this->real - $c->real, $this->imaginary - $c->imaginary);
	}
	
	public function multiply($real, $imaginary = 0) {
		$c = self::toComplex($real, $imaginary);
		[$x1, $y1, $x2, $y2] = [$this->real, $this->imaginary, $c->real, $c->imaginary];
		return new self($x1 * $x2 - $y1 * $y2, $x1 * $y2 + $y1 * $x2);
	}
	
	public function divide($real, $imaginary = 0) {
		$c = self::toComplex($real, $imaginary);
		[$x1, $y1, $x2, $y2] = [$this->real, $this->imaginary, $c->real, $c->imaginary];
		$denominator = $x2 * $x2 + $y2 * $y2;
		if ($denominator == 0) return new self(INF, 0);
		return new self(($x1 * $x2 + $y1 * $y2) / $denominator, ($y1 * $x2 - $x1 * $y2) / $denominator);
	}
	
	public static function toComplex($real, $imaginary = 0) {
		if ($real instanceof self) return $real;
		return new self($real, $imaginary);
	}
	
	public function __toString() {
		if ($this->imaginary == 0) return strval($this->real);
		return $this->real . ($this->imaginary > 0 ? " + " : " - ") . abs($this->imaginary) . "i";
	}
	
	public function __get($property) {
		switch ($property) {
			case 'real':
				return $this->real;
			case 'imaginary':
				return $this->imaginary;
		}
	}
}
?>