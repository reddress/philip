<?php

$json = '{"name": "joe", "age": 23}';

$data = json_decode($json, true);

echo "{$data['name']} is {$data['age']} years old.";
