<?php
/**
 * Model/viewTree model
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Models;

class ViewTree
{

	//深度分支得树(嵌套)
	function create(array $list, $parentId = 'parent_id', $id = 'id')
	{	 

		if(empty($parentId) || empty($id)) return false; 
		$firstLayer = array();
		$child = array(); 
		foreach ($list as $row) {  
			if($row[$parentId] == 0) {
				$row['items'] = array();   
				$firstLayer[$row[$id]] = $this->format($row);
			} else {
				$child[$row[$id]] = $row;
			}
		}
		 

		if(count($child) == 0) return $firstLayer; 
 

		// 各层(从近到远, 从根到叶子)
		$eachLayer = array(0=>$firstLayer);  
		$count = 0;
		$start = count($child);


		while ($start) {
			foreach ($child as $row_id=>$row) {
				$pid = $row[$parentId];
				if( array_key_exists($pid, $eachLayer[$count]) ) {
					if(!isset($eachLayer[$count+1])) {
						$eachLayer[$count+1] = array();
					} 
					$row['items'] = array(); 
					$eachLayer[$count+1][$row_id] = $this->format($row);
					unset($child[$row_id]);
					
				}
			}

			$current = count($child);

			if($start == $current) {
				break;
			} else {
				$start = $current;
				$count ++;
			}
		}
		
		while ($count) {
			foreach ($eachLayer[$count] as $index=>$row) {
				$pid = $row[$parentId];
			 	$eachLayer[$count-1][$pid]['items'][] = $this->format($row);
			}
			unset($eachLayer[$count]);
			$count --;
		}

		$tree = current($eachLayer);
 
		if(count($child) > 0) { 
			$noParent = array();
			foreach ($child as $row) {
				$noParent[] = $this->format($row);
			}
			$tree[] = array(
				'id'=>0,
				'parent_id'=>0,
				'name' => '其他',
				'label' => '其他',
				'items' => $noParent
			);
		}

		return $tree;
	}


	function format($row, $type=1)
	{
		$row['label'] = $row['name']; 
		return $row;
	}

}
