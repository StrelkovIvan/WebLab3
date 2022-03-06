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

<p> Table Ad: </p>
<table border = 4>
    <tr>
        <th> Category </th>
        <th> Title </th>
        <th> Email </th>
        <th> Ad </th>
    </tr>
    <?php
    foreach ($catList as $catName)
    {
        $dir = opendir("categories/$catName");
        while ($Name = readdir($dir))
            if (is_file('categories/'.$catName."/".$Name) )
            {
                $adList[$catName][$Name] = $Name;
            }
    }

    foreach ($adList as $catN => $adsN)
        foreach ($adsN as $v)
        {
            $filePath = "categories/" . $catN . "/" . $v ;
            $file = fopen($filePath, "r");
            $email = fgets($file);
            $text = "";
            while (!feof($file))
                $text .= fgets($file);
            fclose($file);

            echo "<tr> <td> $catN </td>",
            "<td> $v </td>",
            "<td> $email </td>",
            "<td> $text </td>";
        }

    ?>
</table>

</body>
</html>