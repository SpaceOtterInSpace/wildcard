<?php
// This loop runs 1000’s of time a day and is overloading a server.
// The array $rows would typically contain 15,000 – 20,000 entries.

// Rewrite this loop for maximum efficiency

// function get_average($date,$rows) {
//   foreach($rows as $key => $arr) {
//     if(strtotime($date)>strtotime($arr['date'])) {
//       $year=substr($arr['date'],0,4);
//       $month=substr($arr['date'],5,2);
//       $day=substr($arr['date'],7,2);
//       if($year>2008)$type='a';
//       if($year<=2008)$type='d';
//       if($type=='d') {
//         $total+=12;
//       }else {
//         $total+=$month;
//       }
//       $counter++;
//       $avg=$total/$counter;
//     }
//   }
//   return $avg;
// }