<?php
namespace AliasForNamespace\folderforAutoload;//ДОЛЖЕН БЫТЬ УКАЗАН ТУТ 
							//В USE ГДЕ ЕГО ВЫЗЫВАЮТ
							//И В КОМПОСЕРЕ

class HelloWorld
{
		public function __construct(){echo 'I downloaded from file: '.__FILE__. '<br> My space name is : ' . __NAMESPACE__. '<br> This is the result of the motod; ' . __METHOD__;
			
			echo 'this works if you configure composer.json <pre>{
    "autoload": {
        "psr-4": {
            <b>"AliasForNamespace\\": "MyAutoload" </b> <span style="color:green">//Use AliasForNamespace будет павтоподгружать наш класс из folderforAutoload</span>
        }
    }
}</pre>';

echo '<pre><b>file /autoload.php/ - или любой другой, где мы используем автозагрузку</b>
require_once "vendor/autoload.php";
use AliasForNamespace\HelloWorld;<span style="color:green">//ДОЛЖЕН БЫТЬ УКАЗАН ТУТ, ЕСЛИ МЫ ЕГО ВЫЗЫВАЕМ НЕ НАПРЯМУЮ
								 //В NAMESPACE ГДЕ ЕГО ВЫЗЫВАЮТ
								 //И В КОМПОСЕРЕ ДЛЯ АВТОЗАГРУЗКИ</span>

new HelloWorld; //Hello World - вызываем из конструктора</pre>';
			
			
			}
		

} 





