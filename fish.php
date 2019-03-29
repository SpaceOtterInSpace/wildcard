<?php
// A Population of Fish

// There is a population of fish numbering 10,000 at the start of the year.
// Every month 5% of the fish alive at the start of the month, excluding offspring,
// die during the month.
// For the months of May/June/July 25% of the fish alive at the start of the month
// pair off and pro-create. Each pair have 3 off-spring.
// Every month, 15% of newly born fish over 3 months old depart the colony.

// Assumptions:
// Off spring do not procreate
// Make any other assumptions you need if you are in doubt.
// Write code to calculate the number of fish at the end of the year

// Notes:
// Please write the code as plain PHP, it should not be object oriented, and you
// should write it so it can be easily understood.

function get_number_of_fish ($starting_fish) {
  $months[1]['starting_fish'] = $starting_fish;
  for($month = 1; $month <=12; $month++){
    $months[$month]['starting_fish'] = get_starting_fish($month, $months);
    $months[$month]['fish_born'] = get_fish_born($month, $months[$month]['starting_fish']);
    $months[$month]['fish_died'] = get_fish_died($months[$month]['starting_fish']);
    $months[$month]['fish_leaving'] = get_fish_leaving($month,$months);
    $months[$month]['ending_fish'] = get_ending_number_of_fish($months[$month]);
  }
  return $months[12]['ending_fish'];
}

// assume 15% of the fish from the original birthing amount, not 15% of what is left after they leave
// This function still needs some work because it allows for more fish to leave than were actually born
function get_fish_leaving($current_month, $months) {
  $fish_leaving = 0;
  foreach($months as $key_month => $data) {
    if ($current_month - 3 > $key_month) {
      $fish_leaving += $data[$key_month]['fish_born'] * 0.15 ;
    }
  }
  return $fish_leaving;
}

function get_ending_number_of_fish($month) {
  return $month['starting_fish'] + $month['fish_born'] - $month['fish_died'] - $month['fish_leaving'];
}

function get_starting_fish($month, $rows) {
  if ($month == 1) {
    $starting_fish = $rows[1]['starting_fish'];
  } else {
    $starting_fish = $rows[$month-1]['ending_fish'];
  }
  return $starting_fish;
}

function get_fish_born($month, $fish) {
  $fish_born = 0;
  if ($month == 5 || $month == 6 || $month == 7) {
    $fish_born = $fish / 4 / 2 * 3;
  }
  return $fish_born;
}

function get_fish_died($fish_at_beginning_of_month) {
  $fish_died = $fish_at_beginning_of_month * .05;
  return $fish_died;
}

$starting_fish = 10000;

print get_number_of_fish($starting_fish) . "\n";