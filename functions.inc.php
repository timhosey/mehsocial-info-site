<?php

function getUptime(){ 
	// needed some fixing to ditch the float error
	// this is just for funsies to get the count down
	$seconds = (int) @explode(" ", file_get_contents('/proc/uptime'))[0];
	return timearray($seconds);
}


function getCPU(){
  $loads = sys_getloadavg();
  $core_nums = trim(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -l"));
  $load = round($loads[0]/($core_nums + 1)*100, 2);
  return $load;
}

function getMem(){
  $free = shell_exec('free');
  $free = (string)trim($free);
  $free_arr = explode("\n", $free);
  $mem = explode(" ", $free_arr[1]);
  $mem = array_filter($mem);
  $mem = array_merge($mem);
  $memory_usage = $mem[2]/$mem[1]*100;

  return round($memory_usage, 1);
}

function getStorage(){
  return round( ((disk_total_space('/tmp') / disk_free_space('/tmp')) * 100) - 100, 1);
}

function getLatestBackup(){
  $path = "/tmp/backup"; 

  $latest_ctime = 0;
  $latest_filename = '';    

  $d = dir($path);
  while (false !== ($entry = $d->read())) {
    $filepath = "{$path}/{$entry}";
    // could do also other checks than just checking whether the entry is a file
    if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
      $latest_ctime = filectime($filepath);
      $latest_filename = $entry;
    }
  }
  return $latest_ctime;
}

function timeSinceBackup($fileTime){
  $currentTime = time();
  $difference = $currentTime - $fileTime;
  $secondsDiff = $difference;

  $nice = timearray($secondsDiff);

  return $nice["hours"].'h'.$nice["mins"].'m'.$nice["secs"].'s';

}

function getStats() {
  $json = file_get_contents('https://meh.social/api/v1/instance');
  $stats = json_decode($json, true);
  return $stats;
}

function timearray(int $seconds): array {
	$days = (int) ($seconds / 86400);
	$seconds -= $days * 86400;

	$hours = (int) ($seconds / 3600);
	$seconds -= $hours * 3600;

	$mins = (int) ($seconds / 60);
	$seconds -= $mins * 60;

	return array(
		"days"  => $days,
		"hours" => $hours,
		"mins"  => $mins,
		"secs"  => $seconds
	);
}

?>
