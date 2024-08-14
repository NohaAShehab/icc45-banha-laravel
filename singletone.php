<?php
ini_set('display_errors', 1);

# design pattern singletone -->only one object
# can be taken  from the class
class Student{

    private static $count = 0;

    private function __construct(){
        self::$count++;
    }

    static function createObject(){
        if(self::$count == 0){
            return new Student();
        }else{
            throw new Exception("Object already created");
        }
    }
}

$s = Student::createObject();
var_dump($s);

$s2= Student::createObject();
var_dump($s2);
