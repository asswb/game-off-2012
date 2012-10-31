## GitHub Tycoon

Language: PHP & MySQL

GitHub Tycoon is a open source web based game based on simulating the
management of an open source repository on github.

* Login / Logout / Registration
  * username
  * password w/ sha and salt
  
* Real Time Issue System
  * Bugs (~+2 cbq, ~+1 com) t=time/cbq
  * Enhancements (~+2 com, ~+1cbq) t=time/cbq
  * Pull requests (~+com, ~+/-cbq) t=0
  * Code Rebase (~+cbq) t=time/cbq
  
* Leaderboard
  * Rank = cbq * com

Repo Variables

* Community [1..int]
* Code Base Quality [0..1 real]

SQL

users table

* uid
* username
* password (40)
* community size
* code base quality
* working_issue
* working_issue_eta

user issue table

* uiid
* owner uid

issue table (AVOID DUPLICATE)

* iid
* name
* description
* type (enum)
* time
* delta_com
* delta_cbq
* chance [1..100 int]