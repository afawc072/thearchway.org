#!/bin/bash

sudo php statistics.php

gnuplot <<_EOF_
	set title 'Number of searches'
	set datafile separator ","
	set term png
	set output 'rocknrool.jpg'
	set timefmt '%Y-%m-%d'
	set xdata time
	set format x '%Y-%m-%d'
	set autoscale x
	set xtics rotate
	set xlabel "Date"
	set ylabel "Number" 
	#set xrange ["2015-04-15":"2015-04-21"]
	plot "searchStats.txt" using 1:2 with lines lc rgb "green" notitle

	set title 'Number of Users'
	set datafile separator ","
	set term png
	set output 'rocknrool2.png'
	set timefmt '%Y-%m-%d'
	set xdata time
	set format x '%Y-%m-%d'
	set autoscale x
	set xtics rotate 
	set xlabel "Date"
	set ylabel "Number" 
	#set xrange ["2015-04-15":"2015-04-21"]
	plot "UserStats.txt" using 1:2 with lines lc rgb "green" notitle

	set title 'Number of Downloads'
	set datafile separator ","
	set term png
	set output 'rocknrool3.png'
	set timefmt '%Y-%m-%d'
	set xdata time
	set format x '%Y-%m-%d'
	set autoscale x
	set xtics rotate 
	set xlabel "Date"
	set ylabel "Number" 
	#set xrange ["2015-04-15":"2015-04-21"]
	plot "dowloadStats.txt" using 1:2 with lines lc rgb "green" notitle

	set title 'Number of Uploads'
	set datafile separator ","
	set term png
	set output 'rocknrool4.png'
	set timefmt '%Y-%m-%d'
	set xdata time
	set format x '%Y-%m-%d'
	set autoscale x
	set xtics rotate  
	set xlabel "Date"
	set ylabel "Number" 
	#set xrange ["2015-04-15":"2015-04-21"]
	plot "uploadStats.txt" using 1:2 with lines lc rgb "green" notitle
_EOF_