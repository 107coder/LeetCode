package main

import (
	"fmt"
	"github.com/demdxx/gocast"
	"math"
)

func countDigitOne2(n int) int {
	if n == 0 {
		return 0
	}

	numStr := gocast.ToString(n)
	var count = 0

	for i := 0; i < len(numStr); i++ {
		high := numStr[0:i]
		cur := numStr[i : i+1]
		low := numStr[i+1:]

		digit := math.Pow10(len(numStr)-i-1)
		if cur == "0" {
			count += gocast.ToInt(high) * gocast.ToInt(digit)
		} else if cur == "1" {
			count += gocast.ToInt(high)*gocast.ToInt(digit) + gocast.ToInt(low) + 1
		} else {
			count += (gocast.ToInt(high) + 1) * gocast.ToInt(digit)
		}
		fmt.Printf("high: %s, cur: %s, low: %s\n", high, gocast.ToString(cur), low)
	}

	return count
}

func countDigitOne(n int) int {
	if n == 0 {
		return 0
	}

	len := 0
	tmp := n
	for tmp != 0 {
		len++
		tmp /= 10
	}
	var count = 0

	for i := 0; i < len; i++ {
		digit := math.Pow10(len-i-1)

		high := n / int(digit * 10)
		low := n % int(digit)
		cur := (n % int(digit * 10) - low ) / int(digit)


		if cur == 0 {
			count += high * int(digit)
		} else if cur == 1 {
			count += high * int(digit) + low + 1
		} else {
			count += (high + 1) * int(digit)
		}
		fmt.Printf("high: %d, cur: %d, low: %d\n", high, cur , low)
	}

	return count
}
func main() {
	number := 12
	count := countDigitOne(number)

	fmt.Println(count)
}
