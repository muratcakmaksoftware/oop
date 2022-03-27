<?php

abstract class Fruit { // Abstraction kullanılmıştır.
	// Properties // Encapsulation kullanılmıştır
	public $color;

    //Magic Methods
	function __construct($color) { //Oluşturucu: Sınıf ilk oluşturulduğunda tetiklenir.
		$this->color = $color;
	}

	function __destruct() { //Yıkıcı: Sınıfla ilgili işlemler bittiği zaman tetiklenir.
		echo __CLASS__.' destroyed.';
	}

    // Methods // Encapsulation kullanılmıştır
	public function getColor() {
		return $this->color;
	}

    public function setColor($color) {
        $this->color = $color;
    }

    // Polymorphism kullanılmıştır.
    public abstract function weight(); // Zorunlu olarak miras alan sınıf tarafından kullanılması gerekir.
}

//Inheritance kullanılmıştır
class Apple extends Fruit { //extends ile Miras alma yapılmıştır. Apple sınıfı, Fruit üst sınıfın özelliklerini alır.

    //Fruit miras alındığından kaynaklı içerisindeki construct baz alınacaktır.
    //Eğer özelleştirmek istersek bu şekilde yapabiliriz.
	/*function __construct($name) {
		$this->name = $name;
	}*/
	
	public function weight(): int
    {
        return 50;
	}
}

class Melon extends Fruit {
    public function weight(): int
    {
        return 100;
    }
}

$apple = new Apple('Red'); //__construct kullanımını göstermek amaçlı vardır.
echo $apple->getColor().'<br/>'; //bir property bilgisinin alınması
$apple->setColor('Green'); //bir property in değiştirilmesi
echo (1+1).'<br/>'; //__destruct'nı test etmek için arada işlem yapılmıştır.
echo $apple->color.'<br/>'; //public ile açıldığından methodsuzda alabiliriz private yaparak istersek kapatabiliriz.
echo $apple->weight().'<br/>'; //Polymorphism ile nesneye ait bilginin alınması.

$melon = new Melon('Yellow');
echo $melon->getColor().'<br/>';
echo $melon->weight().'<br/>';
echo '<br/>';

/**
 OUTPUT:
 Red
 2
 Green
 50
 Yellow
 100

 Fruit destroyed.Fruit destroyed.
 */