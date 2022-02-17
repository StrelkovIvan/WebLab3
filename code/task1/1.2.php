<?php
    $subject = 'a1b2c3';
    $regex = "/(\d)+/";
    echo preg_replace_callback($regex, fn($matches) => intval($matches[0]) ** 3, $subject);