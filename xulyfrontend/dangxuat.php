<?php
session_start();
include('../config.php');
$google_client->revokeToken();
session_destroy();

echo "<script>
		history.back();
	</script>";
?>