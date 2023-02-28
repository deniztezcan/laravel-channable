<?php

namespace DenizTezcan\Channable\Models;

use ReflectionClass;
use Throwable;

abstract class Model
{
    public function assertType($var, string $type)
    {
        if (gettype($var) === null) {
        } else {
            if (gettype($var) != $type) {
                throw new Throwable('Variable is not of the type: '.$type.' but is of the type: '.gettype($var));
            }
        }
    }

    private static function createObject($deserialized): object
    {
        $ref = new ReflectionClass(static::class);
        $instance = $ref->newInstanceWithoutConstructor();

        foreach ($deserialized as $propertyName => $propertyValue) {
            if ($propertyName != 'errorMessage') {
                $propRef = $ref->getProperty($propertyName);
                $propRef->setAccessible(true);
                $propRef->setValue($instance, $propertyValue);
            }
        }

        return $instance;
    }

    public static function fromResponse(string $responseBody): object
    {
        $deserialized = self::deserialze($responseBody);
        $instance = self::createObject($deserialized);
        $instance->validate();

        return $instance;
    }

    public static function deserialze(string $input): object
    {
        $json = json_decode($input);

        if (!is_object($json)) {
            throw new Throwable('Failed to deserialize: '.$input);
        }

        return $json;
    }

    abstract public function validate(): void;
}