<pre><?php

foreach($db->query('SELECT * FROM users') as $row){
  print_r($row);
}
?></pre>