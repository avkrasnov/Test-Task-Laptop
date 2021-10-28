# Тестовое задание для Laptop.ru
Поскольку в тестовом задании не был указан язык, тестовое задание было выполнено на PHP и JavaScript.
## PHP
Класс для работы с комплексными числами описан в файле `/php/complexmath/lib/complex_number.php`.
Раз уж вакансия подразумевает работу в 1С-Битрикс, то был написан модуль, который эту работу реализует. Конечно, написание целого модуля для такой простой задачи - избыточно, но я сделал так, потому что... могу.
Для установки модуля в 1С-Битрикс нужно скопировать папку `/php/complexmath` в папку с модулями 1С-Битрикс (`/local/modules` или `/bitrix/modules`) на сервере. Затем установите этот модуль в админке (Настройки -> Настройки продукта -> Модули).
Протестировать модуль можно в командной строке в той же админке (Настройки -> Инструменты -> Командная PHP-строка):
```php
//title: Тестирование модуля complexmath

\Bitrix\Main\Loader::includeModule("complexmath");
use ComplexMath\ComplexNumber;

$a = new ComplexNumber(-2.5, 3);
$b = new ComplexNumber(4, -5.8);

echo $a->add($b) . PHP_EOL; // 1.5 - 2.8i
echo $a->subtract($b) . PHP_EOL; // -6.5 + 8.8i
echo $a->multiply($b) . PHP_EOL; // 7.4 + 26.5i
echo $a->divide($b) . PHP_EOL; // -0.55197421434327 - 0.050362610797744i

echo $a->multiply(3) . PHP_EOL; // -7.5 + 9i
echo $a->multiply(-2.5, -3) . PHP_EOL; // 15.25
echo $a->divide(0, 0) . PHP_EOL; // INF
echo $a->add($b)->multiply(-1.8, -4.12)->subtract($a)->divide(new ComplexNumber(5, 5)) . PHP_EOL; // -1.5876 + 0.7596i

try {
	echo $a->add([1, 2], 0);
} catch (Exception $e) {
	echo $e->getMessage(); // The value of an argument 'real' must be of type numeric
}
```
## JavaScript
Класс для работы с комплексными числами описан в файле `/js/class.complex_number.js`.
Проверить работу класса можно, открыв файл `/js/demo.html` в браузере.