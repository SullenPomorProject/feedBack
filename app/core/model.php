<?php

namespace App\Core;

abstract class Model
{
    abstract public function fetchMessages();

    abstract public function saveMessage($array = []);
}