package main

import (
	"fmt"
)

// Definition for a Node.
type Node struct {
	Val    int
	Next   *Node
	Random *Node
}

func main() {
	var node1, node2, node3, node4, node5 Node
	node1.Val = 7
	node1.Next = &node2
	node1.Random = nil

	node2.Val = 13
	node2.Next = &node3
	node2.Random = &node1

	node3.Val = 11
	node3.Next = &node4
	node3.Random = &node5

	node4.Val = 10
	node4.Next = &node5
	node4.Random = &node3

	node5.Val = 1
	node5.Next = nil
	node5.Random = &node1

	rtn := copyRandomList(&node1)
	fmt.Println(rtn)
}

func copyRandomList(head *Node) *Node {
	if head == nil {
		return nil
	}
	var new, cur *Node
	old := head
	// 首先在循环外边创建第一个节点
	var node Node
	node.Val = old.Val
	new = &node
	cur = new
	num := 1
	for old.Next != nil {
		old = old.Next
		var node Node
		node.Val = old.Val
		cur.Next = &node
		cur = cur.Next
		num++
	}

	tmp := new
	cur = new
	old = head
	for old != nil {
		random := old.Random
		if random == nil {
			cur.Random = nil
		} else {
			randomToEndCount, countToEnd := 0, num-1
			for random.Next != nil {
				randomToEndCount++
				random = random.Next
			}
			for countToEnd > randomToEndCount {
				tmp = tmp.Next
				countToEnd--
			}
			cur.Random = tmp
			tmp = new
		}
		old = old.Next
		cur = cur.Next
	}
	return new
}
