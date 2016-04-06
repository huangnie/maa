<?php
/**
 * Test/view table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Test\Models;

use Core\Model;

use Test\Tables\Test;
use Test\Tables\Param;
use Test\Tables\Result;

class View extends Model
{
	
    function testList($subjectId)
    {
        $tab =  new Test();
        $tab->where_in('subject_id', $subjectId);
        return $this->table($tab)->noLimit()->with('param')->getMultiRows();
    }

    function testParam($testId)
    {
        $tab =  new Param();
        $tab->where_in('test_id', $testId);
        return $this->table($tab)->noLimit()->getMultiRows();
    }

    function testResult($testId)
    {
        $tab =  new Result();
        $tab->where_in('test_id', $testId);
        return $this->table($tab)->noLimit()->getMultiRows();
    }
}