<?php
// This loop runs 1000’s of time a day and is overloading a server.
// The array $rows would typically contain 15,000 – 20,000 entries.

// Rewrite this loop for maximum efficiency

function get_average($date,$rows) {
  foreach($rows as $key => $arr) {
    if(strtotime($date)>strtotime($arr['date'])) {
      $year=substr($arr['date'],0,4);
      $month=substr($arr['date'],5,2);
      $day=substr($arr['date'],7,2);
      if($year>2008)$type='a';
      if($year<=2008)$type='d';
      if($type=='d') {
        $total+=12;
      }else {
        $total+=$month;
      }
      $counter++;
      $avg=$total/$counter;
    }
  }
  return $avg;
}

function get_average_optimized($date,$rows) {
  $total = 0;
  $counter = 0;
  $time = strtotime($date);
  foreach($rows as $key => $value) {
    if($time > strtotime($value['date'])) {
      $year = substr($value['date'],0,4);
      $month = substr($value['date'],5,2);
      $day = substr($value['date'],7,2);
      if($year <= 2008) $type='d';
      if($type == 'd') {
        $total += 12;
      } else {
        $total += $month;
      }
      $counter++;
    }
  }
  return $total/$counter;
}

$rows[0]['date'] = '20090526';
$rows[1]['date'] = '20151208';
$rows[2]['date'] = '20041208';
$rows[3]['date'] = '19991208';

print (get_average('20190327',$rows) == get_average_optimized('20190327',$rows)) . "\n";
print get_average('20190327',$rows) . "\n";
print get_average_optimized('20190327',$rows) . "\n";