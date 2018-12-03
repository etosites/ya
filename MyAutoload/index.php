<?php
namespace AliasForNamespace; //при его указании автозагрузчик будет искать файлы от этой папки
require_once '../vendor/autoload.php';
use AliasForNamespace\folderforAutoload\HelloWorld;//ДОЛЖЕН БЫТЬ УКАЗАН ТУТ, ЕСЛИ МЫ ЕГО ВЫЗЫВАЕМ НЕ НАПРЯМУЮ
								 //В NAMESPACE ГДЕ ЕГО ВЫЗЫВАЮТ
								 //И В КОМПОСЕРЕ ДЛЯ АВТОЗАГРУЗКИ




new HelloWorld; //Hello World - вызываем из конструктора
$ololo = new \AliasForNamespace\folderforAutoload\Test; //поэтому тут указываем со \, что бы искал 
														//от корня, а не от namespace указаного выше.
$ololo->ololo();

?>
