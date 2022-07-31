<?php

$discord_url = "https://discord.com/api/oauth2/authorize?client_id=997424069781757952&redirect_uri=https%3A%2F%2Fcrypt.teampyro.tech%2Fprocess-oauth.php&response_type=code&scope=identify%20email";
header("location: $discord_url");
exit();

?>