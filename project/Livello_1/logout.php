<?php
session_start();

session_unset();
session_destroy();

header("Location: home_no_log.html");
