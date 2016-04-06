<?php
/**
 * PHP Pagination Class
 *
 * @author huangnie - 980484578@qq.com
 * @version 1.1
 * @date created 3 ,4, 2016
 */

namespace Helpers;

/**
 * Split records into multiple pages.
 */
class Paginator
{

    /**
     * [$_path description]
     * @var [type]
     */
    private $_path;

     /**
     * Set the total number of records/items.
     *
     * @var numeric
     */
    private $_total = 0;

     /**
     * Sets the page number.
     *
     * @var numeric
     */
    private $_page;

    /**
     * Set the number of items per page.
     *
     * @var numeric
     */
    private $_pageSize;

    /**
     * Set get num for fetching the page number.
     *
     * @var string
     */
    private $_pageBarLength;


    /**
     *  
     *
     * @var string
     */
    private $_pageFieldName = 'page';

    /**
     *  
     *
     * @var string
     */
    private $_pageSizeFieldName = 'pageSize';
 

    /**
     *  __construct
     *
     *  Pass values when class is istantiated.
     *
     * @param numeric  $pageSize  sets the number of iteems per page
     * @param numeric  $page sets the page for the GET parameter
     */
    public function __construct($total, $page=1, $pageSize=15, $pageBarLength=8)
    {
        $this->_total = intval($total);
        $this->_page = intval($page);
        $this->_pageSize = intval($pageSize);
        $this->_pageBarLength = intval($pageBarLength);
    }

    /**
     * getStart
     *
     * Creates the starting point for limiting the dataset.
     *
     * @return numeric
     */
    private function _getStart()
    {
        return floor($this->_page / $this->_pageBarLength) * $this->_pageBarLength + 1;
    }

     /**
     * getStart
     *
     * Creates the starting point for limiting the dataset.
     *
     * @return numeric
     */
    private function _getPrev()
    {
        return $this->_page > 1 ? $this->_page - 1 : 1;
    }
 

    /**
     * pageLinks
     *
     * Create the html links for navigating through the dataset.
     *
     * @param string $path optionally set the path for the link
     * @param string $ext optionally pass in extra parameters to the GET
     *
     * @return string returns the html menu
     */
    public function pageBar($path = '?', $ext = '')
    {
        if($this->_total <= $this->_pageSize) return '';
        
        $query = array();
        if(is_array($ext)) {
            foreach ($ext as $key => $value) {
                $query[] = "{$key}={$value}";
            }
        }
        
        $query = implode('&', $query);
        $this->_path = !empty($path) ? rtrim($path, '?') : '';
        $this->_path = $this->_path . (empty($query) ? '' : '?' . ltrim($query, '?'));
        $this->_path = str_replace('[:pageSize]', $this->_pageSize, $this->_path);

        $pageBar = array();
        $pageBar[] = '<nav class="text-center"> <ul class="pagination">';

        $prev = $this->_getPrev();
        $class =  $this->_page == 1 ? 'class="disabled"' : '';
        $prev_link = str_replace('[:page]', $prev, $this->_path);
        $pageBar[] = '<li '.$class.'><a href="'.$prev_link.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span> </a></li>';

        $start = $this->_getStart();
        $last = ceil($this->_total / $this->_pageSize);
        $end = ($start + $this->_pageBarLength) > $last ? $last : ($start + $this->_pageBarLength);

        for($i = $start; $i <= $end; $i++) {
            $page_link = str_replace('[:page]', $i, $this->_path);
            $class = $i == $this->_page ? 'class="active"' : '';
            $pageBar[] = '<li '.$class.'><a href="'.$page_link.'" aria-label="'.$i.'"><span aria-hidden="true">'.$i.'</span> </a></li>';
        }
        $class =  $this->_page == $last ? 'class="disabled"' : '';
        $next_link = str_replace('[:page]', $this->_path + 1, $this->_path);
        $pageBar[] = '<li '.$class.'><a href="'.$next_link.'" aria-label="Next"><span aria-hidden="true">&raquo;</span> </a></li>';
        $pageBar[] = '<li class="disabled"><a href="javascript:;" aria-label="总计" '.$class.'><span aria-hidden="true">共'.$last.'页/'.$this->_total.'条</span> </a></li><ul><nav>';
        return implode('', $pageBar);
    }

}
