<pre><?php

/* SAMPLE USAGE: 

// Init the class
$cron = new poormanscron();

// This is a random example of the last time the function was run
$lastrun = time()-rand(0,10);
// This is how often / how long the function is supposed to last.
$interval = rand(2,4);
// We call the cron run, and are given a data object in return
$info = $cron->run($lastrun,$interval);

echo "Lastrun = $lastrun\ninterval = $interval\ntime = ".time()."\n\n";

echo "Update over time example:\n\n";

if($info->run > 0){
  for($i=0;$i<$info->run;$i++){
    echo ($i+1)." Run the function!\n";
  }
  echo "New lastrun: ".$info->lastrun."\n";
} else {
  echo "Nothing to run!\n";
}
echo "\n";

echo "Update once example\n";

if($lastrun != 0){//Check against a sentinel value
  if($info->run > 0){
    echo "Run the function!\n";
    echo "Clear the lastrun.\n";
  } else {
    echo "Still waiting\n";
  }
} else {
  echo "This event already happend.\n";
}
*/

class poormanscron {
  function __construct(){
    $this->now = time();
  }
  function run($lastrun,$interval){
    $diff = $this->now - $lastrun;
    $data = new stdClass();
    if($diff > 0){
      $data->run = floor($diff/$interval);
      $data->lastrun = $this->now - ($diff - $interval*$data->run);
    } else {
      $data->run = 0;
      $data->lastrun = $lastrun;
    }
    return $data;
  }
}