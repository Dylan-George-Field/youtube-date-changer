<?php
/* This file will change dates into YouTube style "one day ago, month ago, year ago" style */
/* I'm using the input format get_the_time('d/m/Y'), ensure you use get_the_time() and not get_the_date() */
/* I'll have to change this simply to '1-7 days ago', '1-4 weeks ago', '1-12 months ago', '1-9999 years ago' */ 
/* Modulus would be useful here */

function youtubeDateChanger ($date) {
	$result = "Unknown";
	
	if ($date) {
		$date = str_replace('/', '-', $date);
		
		$datetime1 = new DateTime(date('Y-m-d', strtotime($date)));
		$datetime2 = new DateTime(date('Y-m-d'));
		$interval = $datetime1->diff($datetime2);
		
		$counter = $interval->format('%a');
		
		if ( $counter == 0 ) {
			$result = "today";
		} elseif ( $counter == 1 ) {
			$result = "yesterday";
		} elseif ( $counter >= 2 && $counter < 7 ) {
			$result = $counter." days ago";
		} elseif ( $counter >= 7 && $counter < 14 ) {
			$result = "1 week ago";
		} elseif ($counter >= 14 && $counter < 21 ) {
			$result = "2 weeks ago";
		} elseif ($counter >= 21 && $counter < 28 ) {
			$result = "3 weeks ago";
		} elseif ($counter >= 28 && $counter < 31 ) {
			$result = "4 weeks ago";
		} elseif ($counter >= 31 && $counter < 38 ) {
			$result = "1 month ago";
		} elseif ($counter >= 38 && $counter < 61 ) {
			$result = "1 month ago";
		} elseif ($counter >= 61 && $counter < 92 ) {
			$result = "2 months ago";
		} elseif ($counter >= 92 && $counter < 183 ) {
			$result = "3 months ago";
		} elseif ($counter >= 183 && $counter < 365 ) {
			$result = "6 months ago";
		} elseif ($counter >= 365 && $counter < 730 ) {
			$result = "1 year ago";
		} elseif ($counter >= 730 && $counter < 1095 ) {
			$result = "2 years ago";
		} elseif ($counter >= 1095 && $counter < 1825 ) {
			$result = "3 years ago";
		} elseif ($counter >= 1825 && $counter < 3650 ) {
			$result = "5 years ago";
		} elseif ($counter >= 3650 ) {
			$result = "10 years ago";
		}
		
		return $result;
		
	} else {
		throw new Exception('No input date found');
	}
}