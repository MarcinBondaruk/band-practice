<?php
namespace App\Infrastructure\Utils;

class ReflectionService
{
    public static function createObject(string $className, array $data = [])
    {
        $refClass = new \ReflectionClass($className);
        $refObject = $refClass->newInstanceWithoutConstructor();
        foreach ($data as $propertyName => $value) {
            $property = $refClass->getProperty($propertyName);
            $property->setAccessible(true);
            $property->setValue($refObject, $value);
        }
        return $refObject;
    }
}
