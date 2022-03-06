<?php

if (!isset($_POST["adCat"],$_POST["Title"],$_POST['Email'], $_POST['Text']))
{
    echo "Error!";
    return;
}

$text = fopen("categories/" . $_POST["adCat"] . "/" . $_POST["Title"] . ".txt", "w");
fwrite($text, $_POST['Email'] . "\n");
fwrite($text, $_POST['Text']);
fclose($text);
header("Location: main.php");