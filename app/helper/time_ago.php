<?php
//Time ago 
function extrafact_time_ago($timestamp){
  $time_ago = strtotime($timestamp);
  $current_time = time();
  $time_difference = $current_time - $time_ago;
  $seconds = $time_difference;
  $minutes = round($seconds / 60); //value 60 is seconds
  $hours = round($seconds / 3600); //value 3600 is 60 minutes * 60 seconds
  $days = round($seconds / 86400); //value 86400 = 24 * 60 * 60
  $weeks = round($seconds / 604800); // 7*24*60*60
  $months = round($seconds / 2629440); //((365+365+365+365)/5/12)*24*60*60
  $years = round($seconds / 31553280); // (365+365+365+365)/5*24*60*60

  if ($seconds <= 60) {
    return "Just Now";
  } elseif($minutes <= 60){
    if ($minutes == 1) {
      return "One minute ago";
    }else{
      return $minutes . " minutes ago";
    }
  }elseif ($hours <= 7) {
    if ($hours == 1) {
      return "An hour ago";
    }else{
      return $hours . " hours ago";
    }
  }elseif ($days <= 24) {
    if ($days == 1) {
      return "Yesterday";
    }else{
      return $days . " days ago";
    }
  }elseif ($weeks <= 4.3) {
    if ($weeks == 1) {
      return "A week ago";
    }else{
      return $weeks . " weeks ago";
    }
  }elseif ($months <= 12) {
    if ($months == 1) {
      return "A month ago";
    }else{
      return $months . " months ago";
    }
  }else{
    if ($hours == 1) {
      return "A year ago";
    }else{
      return $years . " years ago";
    }
  }
}