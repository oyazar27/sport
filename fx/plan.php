Plan

Select LBO value for a day

Run test

wrie result to db


Time stamps are in GMT with no DST 

(2 saat geri)



read date, longentry, long tp, long sl, shortentry, shorttp, shortsl from daily

read low - high for the same date from main

step over high

if  high > longentry -> long started
    high < longtp -> long tp
    low < longsl -> long sl
    
    low < shortentry -> short started
    low < shorttp -> short tp
    high > shortsl -> short sl
    
    FIND ANOTHER WAY OF LOOPING WITH BREAK
    
    If max high > longentry -> started
    if min low < shortentry -> started
    
if both long tp and long sl -> earlier applies
if both short tp and short sl -> earlier applies

Long start y/n
Long result tp sl pos abort neg abort

Short start y/n
Short result tp sl pos abort neg abort
    
    
    

