<?php

/*
 * Author: doug@neverfear.org
 */

class PriorityList {
	public $next;
	public $data;
	function __construct($data) {
		$this->next = null;
		$this->data = $data;
	}
}

class PriorityQueue {
	
	private $size;
	private $liststart;
	private $comparator;
	
	function __construct($comparator) {
		$this->size = 0;
		$this->liststart = null;
		$this->listend = null;
		$this->comparator = $comparator;
	}
	
	function add($x) {
		$this->size = $this->size + 1;
		
		if($this->liststart == null) {
			$this->liststart = new PriorityList($x);
		} else {
			$node = $this->liststart;
			$comparator = $this->comparator;
			$newnode = new PriorityList($x);
			$lastnode = null;
			$added = false;
			while($node) {
				if ($comparator($newnode, $node) < 0) {
					// newnode has higher priority
					$newnode->next = $node;
					if ($lastnode == null) {
						//print "last node is null\n";
						$this->liststart = $newnode;
					} else {
						//print "Debug: " . $newnode->data . " has lower priority than " . $lastnode->data . "\n";
						$lastnode->next = $newnode;
					}
					$added = true;
					break;
				}
				$lastnode = $node;
				$node = $node->next;
			}
			if (!$added) {
				// Lowest priority - add to the very end
				$lastnode->next = $newnode;
			}
		}
		//print "Debug: Appended node. New size=" . $this->size . "\n";
		//$this->debug();
	}
	
	function debug() {
		$node = $this->liststart;
		$i = 0;
		if (!$node) {
			print "<< No nodes >>\n";
			return;
		}
		while($node) {
			print "[$i]=" . $node->data[1] . " (" . $node->data[0] . ")\n";
			$node = $node->next;
			$i++;
		}
	}
	
	function size() {
		return $this->size;
	}
	
	function peak() {
		return $this->liststart->data;
	}
	
	function remove() {
		$x = $this->peak();
		$this->size = $this->size - 1;
		$this->liststart = $this->liststart->next;
		//print "Debug: Removed node. New size=" . $this->size . "\n";
		//$this->debug();
		return $x;
	}
}
