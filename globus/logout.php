<?php
session_start();
//load and initialize database class
require_once 'core/db.php';
$db = new DB();
$log=$db->registerLogOut($_SESSION['ID'], $_SESSION['type']);
session_unset();
session_destroy();
?>
<script language="javascript">
document.location="index.php";
</script>
