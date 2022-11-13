<?php

function getUptime(){ 
  $str   = @file_get_contents('/proc/uptime');
  $num   = floatval($str);
  $secs  = fmod($num, 60);
  $num = intdiv($num, 60);
  $mins  = $num % 60;
  $num = intdiv($num, 60);
  $hours = $num % 24;
  $num = intdiv($num, 24);
  $days  = $num;

  return array(
    "days"  => $days,
    "hours" => $hours,
    "mins"  => $mins,
    "secs"  => $secs
  );
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
  return round( (disk_free_space('.') / disk_total_space('.')) * 100, 1);
}

function getLatestBackup(){
  $path = "/backup"; 

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
  $currentTime = now();
  $difference = $currentTime - $fileTime;
  $secondsDiff = $difference;

  $secs = $secondsDiff % 60;
  $hrs = $secondsDiff / 60;
  $mins = $hrs % 60;

  $hrs = $hrs / 60;

  return $hrs.'h '.$mins.'m '.$secs.'s';
}

?>