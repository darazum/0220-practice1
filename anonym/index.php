<?php
// внешнаяя переменная с контекстом вызова
$context = 'Anonimous functions and other';

// анонимная функция, принимающая строку и использующая контекст
$func = function(string $message) use ($context)
{
    return 'i am anonymous function and i want to say: ' . $message . ' from ' . $context;
};

//
//// анонимная функция, принимающая строку и использующая контекст
//$func2 = function(string $message) use ($context)
//{
//    return 'i am second anonymous function and i want to say: ' . $message . ' from ' . $context;
//};
//
////// вызываем анонимную ф-цию
////echo $func('hello');
////var_dump($func);
////
//// метод, который вызывает функцию
//function caller(callable $function, $message)
//{
//    echo 'calling: ' . $function($message);
//}
//
//
// вызов анонимной функции сразу после создания - замыкание
$users = (function() use ($context) {

    // эта переменная создается только 1 раз при вызове функции и исчезает сразу после вызова не занимая память
    $userNameTemplate = 'Маша номер %d создана в контексте ' . $context;

    $users = [];
    for($i = 1; $i <= 10; $i++) {
        $users[] = str_replace('%d', $i, $userNameTemplate);
    }

    return $users;
})();

var_dump($users);
var_dump($userNameTemplate);
