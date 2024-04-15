<?php

namespace app\core;

abstract class Model
{
    abstract public function get();

    abstract public function insert($array = []);
}