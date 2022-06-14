<?php

session_start();
session_unset();
session_destroy();

header("location: /cio-points-web-app/index.php?status=LogoutSuccess");
