<?php

$discord_url = "https://discord.com/api/oauth2/authorize?client_id=997424069781757952&redirect_uri=http%3A%2F%2Flocalhost%2Fcrypt22%2Fprocess-oauth.php&response_type=code&scope=identify%20email";
header("location: $discord_url");
exit();

?>