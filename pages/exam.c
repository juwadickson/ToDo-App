#include <stdio.h>
#include <stdlib.h>

int isDigitIncreasing(int n){
    int a = 1;
    int sum = 1;
    while (a <= n)
    {
        if(n % a == 0 && a * 10 > n){
            return 1;
        }
        sum = sum * 10 + 1;
        a += sum;
    }
    return 0;
    
}