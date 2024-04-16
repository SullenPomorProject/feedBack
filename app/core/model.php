<?php

namespace App\Core;

abstract class Model
{
    abstract public function get();

    abstract public function insert($array = []);
}