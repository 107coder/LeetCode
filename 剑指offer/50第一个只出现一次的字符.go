package main

import "fmt"

func main() {
	s := "leetcode"
	res := firstUniqChar(s)
	fmt.Println(res)
}
func firstUniqChar(s string) byte {
	m := make(map[byte]int)

	for _, data := range s {
		tmp := byte(data)
		m[tmp]++
	}

	for _, data := range s {
		if m[byte(data)] == 1 {
			return byte(data)
		}
	}
	return ' '
}
