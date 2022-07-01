<?php

class Router {
    private array $routes; // для хранения маршрутов

    public function __construct() {
//        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include(ROOT.'/config/routes.php'); //присваеваем путь к фаилу с роутами
    }


    //возвращает введенный стринг из строки запроса
    private function getFormattedURL() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');

        }
    }

    public function run() {
        //получить строку запроса
        $uri = $this->getFormattedURL(); //       news/sport/114

        //проверить наличие такого запроса в массиве routes(который получил данные из фаила routes.php)
        foreach ($this->routes as $uriPattern => $path) {
            //сранвиваем строку запроса с данными из массива routes,
            //"~$uriPattern~" разделяется тильдами тк в нем могут лежать слеши и его не расспарсит метод
            if (preg_match("~$uriPattern~", $uri)) { // прегматч возвращает булеан, детектит совпадения в строке

                //Получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                print $path;
                print "<br>".$uriPattern;
                print "<br>".$uri;
                print "<br>".$internalRoute;

                //определить какой контроллер,action и параметры
                $segments = explode('/', $internalRoute); //делит строку для разделения контроллера и экшена(те метод этого контролеера) и ретурнит массив
                var_dump($segments);
                $controllerName = ucfirst(array_shift($segments)."Controller"); //получает название контроллера из массива и удаляет его из массива


                print $controllerName;

                $actionName = 'action'.ucfirst(array_shift($segments)); //получает название экшена из массива и удаляет его из массива
                print "<br>".$actionName;


                //в итоге в массиве остаются только параметры которые и присваиваем
                $parameters = $segments;

                echo "<pre>";
                print_r($parameters);

                //подключить все фаил  контроллера (если такой фаил существует импорти его сюда)
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                //создать объект и вызвать метод
                $controllerObject = new $controllerName;

//на созданном объекте вызываем метод и результат присваиваем переменной
//                $res = $controllerObject->$actionName($parameters); //вызывает метод actionView и передаёт параметры

                //вызывает фукцию если такая есть и передает массив с параметрами (методу надо менять синтаксис приема массива)
                $res = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($res != null) {
                    break;
                }

            }
        }

    }
}