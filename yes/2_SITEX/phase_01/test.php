<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 28/02/2019
 * Time: 13:28
 */

echo "hello world !";

$source = array("/All/mo/modernizr.min.js", "/All/jQ/jquery.min.js", "JS/main.js");

echo print_r($source);
?>

<?php foreach($source as $aSource): ?>
    <h1> src="<?= $aSource ?>" </h1>
<?php endforeach; ?>