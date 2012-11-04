## GitHub Tycoon

# Requirements

* PHP (Tested on 5.3.2-1)
* MySQL (Tested on 14.14)

# Installation (Linux)

Clone this repo to your system, and softlink (`ln -s`) `/www` to your 80 (e.g. `/var/www/ght`)

Create a table and user, and import `/structure.sql` into that table.

Copy `/config.sample.php` to `/config.php` and insert your database information along with a sufficiently strong and random salt.