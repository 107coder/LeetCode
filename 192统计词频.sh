#!/bin/bash

declare -A words
for word in $(cat words.txt);do
        ((words[$word]++))
done

max=0
maxWord=''
for ((j=0; j<${#words[*]}; j++)){
        for i in "${!words[@]}";do
                if [ $max -lt ${words[$i]} ];then
                        max=${words[$i]}
                        maxWord=$i
                fi
        done
        echo "$maxWord $max"
        max=0
        words[$maxWord]=0
}