<?php

$catDir = opendir('categories'); 
$catList = [];
$adList = [];
while ($catName = readdir($catDir))
{
    if (is_dir("categories/$catName") && $catName !== '.' && $catName !== '..')
    {
        $catList[] = $catName;
        $adList[$catName] = [];
    }
}
?>

<html>
<head>
    <title>Файлы</title>
    <meta charset="UTF-8">
</head>
<body>
<form action="addAd.php" method="POST">
    Your ad: <br>
    Name:   <input name="Title" ><br>
    Email:  <input name="Email" ><br>
    Text:   <textarea name="Text" rows="7" cols="40" ></textarea><br>
    Category:
    <select name="adCat">
        <?php
        foreach ($catList as $v)
        {
            echo "<option> $v </option>";
        }
        ?>
    </select><br><br>
    <input type="submit" value = "Submit">
</form>



</body>
</html>