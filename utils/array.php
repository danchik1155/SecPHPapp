<?php

$data = [1,2,3,44,55,66];

$data[] = 77;

# echo($data[6]);


for ($i=0; $i < 7; $i++) { 
    echo($data[$i]. "<br/>");
}