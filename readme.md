# GitHub Tycoon

GitHub Tycoon is a persistent software repository management simulation game.

## Demo

Check out the demo: [http://githubtycoon.ftp.sh](http://githubtycoon.ftp.sh).

## Requirements

* PHP (Tested on [5.3.2-1ubuntu4.18 & 5.3.10-1ubuntu3.4](https://launchpad.net/php/+packages))
* MySQL (Tested on [5.1.66-0ubuntu0.10.04.1 & 5.5.28-0ubuntu0.12.04.2](https://launchpad.net/mysql-server/+packages)) 

## Installation (Linux)

1. Clone this repo to your system, and softlink (`ln -s`) `/www` to your 80 (e.g. `/var/www/ght`). If you bump into a 403 permission issue, make sure all of the parent directories to the cloned directory, including www have the x permission (e.g.chmod a+x). Furthermore, you need +FollowSymLinks. (Alternatively, you could just move the contents of www into your /var/www folder.
2. Run `./structure` so you can track when to update your MySQL structure. After the alpha release, we will write patches.
3. Create a table and user, and import `/structure.sql` into that table.
4. Copy `/config.sample.php` to `/config.php` and insert your database information along with a sufficiently strong and random salt.

## Technologies used

* PHP
* MySQL
* Twitter Bootstrap
* Bootswatch

## Screenshots

![The Issues](https://raw.github.com/asswb/game-off-2012/master/dev/screenshots/screenshot1.png)
![The Leaderboard](https://raw.github.com/asswb/game-off-2012/master/dev/screenshots/screenshot2.png)