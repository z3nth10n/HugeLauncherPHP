<?php
/**
 * Created by PhpStorm.
 * User: Álvaro
 * Date: 06/09/2017
 * Time: 21:57
 */

include("../../Classes/Parsedown.php");

$markDown = new Parsedown();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php

$action = @$_GET["action"];
$lang = isset($_GET["lang"]) ? $_GET["lang"] : "en";

if(isset($action))
{
    $name = substr($action, 4);
    $markDown->text(file_get_contents(Core::StrFormat("Langs/{0}/{1}_{2}.md", ucfirst($name), $name, $lang)));
}

?>

</body>
</html>
