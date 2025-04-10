<?php
session_start();
session_unset();
session_destroy();
header("Location: 2.SESSION.php");
