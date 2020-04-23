#!/bin/bash

# 195第十行

IFS="
"
count=0
for line in $(cat file02.txt); do
	count=$((count+1))
	if (( $count==10 ));then
		echo $line
	fi
done
