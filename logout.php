<?php
session_start();
?>
<script>
window.alert("Logging out..");
<?php
	session_unset();
	session_destroy();
?>
window.document.location.href='auto.php';
</script>
