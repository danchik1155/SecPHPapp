<?php

$pwd="123456";

$hpwd = hash("sha256", $pwd);

echo ($hpwd);