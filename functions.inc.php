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

?>