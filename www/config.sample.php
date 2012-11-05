<?php

// MySQL settings; Your web host should provide this information.

define("DB_HOST","localhost"); // Database host - Usually `localhost`.
define("DB_NAME",""); // Database name
define("DB_USER",""); // Database username
define("DB_PASS",""); // Database password

// System settings; Provide these yourself.

// Generate a random string of characters to increase security.
// Do not change this value after deployment.
define("SYS_SALT",""); // System salt for passwords

// This number determines how often the cron will run to check for
// new issues for users. Keep in mind, every time you check, there
// is a percent chance that you will recieve new issues, thus;
// The smaller this number, the faster one gets tickets.
define("SYS_ISSUE_INTERVAL",10);

define("DEBUG",FALSE); // Enable the debug flag
