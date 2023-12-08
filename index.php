<?php
require_once("inc/translate.php");

?>

<h1>le titre : <?= $t("Hello-bxl") ?></h1>
<button><?= $t('home') ?></button>


<?php
$t_save();
?>