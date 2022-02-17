<?php
    $regex = '/a..b/';
    $str = 'ahb acb aeb aeeb adcb axeb';
    echo preg_match($regex,$str);