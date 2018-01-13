<?php
/** @file Pagination.php
 *  Pagination class
 * 
 *  @brief Pagination class to handle big resultset display
 */
 
/** @class Pagination
 *  @brief Helper class to handle big resultset display
 *
 *  Split big resultsets into smaller subsets and
 *  generates the corresponding links to navigate between   
 *  each subset 
 */ 
class Pagination{
    private $totalItems;
    private $numPages;
    private $itemsPerPage;
    private $currentPage;
    private $maxPagesToShow = 10;

    /**
     * @param int $totalItems The total number of items.
     * @param int $itemsPerPage The number of items per page.
     * @param int $currentPage The current page number.
     */
    public function __construct($totalItems, $itemsPerPage, $currentPage)
    {
        $this->totalItems = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->currentPage = $currentPage;
        $this->updateNumPages();
    }

    private function updateNumPages()
    {
        $this->numPages = ($this->itemsPerPage == 0 ? 0 : (int) ceil($this->totalItems/$this->itemsPerPage));
    }

    /**
     * @param int $maxPagesToShow
     */
    public function setMaxPagesToShow($maxPagesToShow)
    {
        $this->maxPagesToShow = ($maxPagesToShow < 3) ? 3 : $maxPagesToShow;
    }

    /**
     * @return int
     */
    public function getMaxPagesToShow()
    {
        return $this->maxPagesToShow;
    }

    /**
     * @param int $currentPage
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @param int $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
        $this->updateNumPages();
    }

    /**
     * @return int
     */
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param int $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
        $this->updateNumPages();
    }

    /**
     * @return int
     */
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @return int
     */
    public function getNumPages()
    {
        return $this->numPages;
    }

    public function getNextPage()
    {
        if ($this->currentPage < $this->numPages) {
            return $this->currentPage + 1;
        }

        return $this->currentPage;
    }

    public function getPrevPage()
    {
        if ($this->currentPage > 1) {
            return $this->currentPage - 1;
        }

        return $this->currentPage;
    }

    /**
     * Get an array of paginated page data.
     *
     * Example:
     * array(
     *     array ('num' => 1,     'isCurrent' => false),
     *     array ('num' => '...', 'isCurrent' => false),
     *     array ('num' => 3,     'isCurrent' => false),
     *     array ('num' => 4,     'isCurrent' => true ),
     *     array ('num' => 5,     'isCurrent' => false),
     *     array ('num' => '...', 'isCurrent' => false),
     *     array ('num' => 10,    'isCurrent' => false),
     * )
     *
     * @return array
     */
    public function getPages()
    {
        $pages = array();

        if ($this->numPages <= 1) {
            return array();
        }

        if ($this->numPages <= $this->maxPagesToShow) {
            for ($i = 1; $i <= $this->numPages; $i++) {
                $pages[] = $this->createPage($i, $i == $this->currentPage);
            }
        } else {

            // Determine the sliding range, centered around the current page.
            $numAdjacents = (int) floor(($this->maxPagesToShow - 3) / 2);

            if ($this->currentPage + $numAdjacents > $this->numPages) {
                $slidingStart = $this->numPages - $this->maxPagesToShow + 2;
            } else {
                $slidingStart = $this->currentPage - $numAdjacents;
            }
            if ($slidingStart < 2) $slidingStart = 2;

            $slidingEnd = $slidingStart + $this->maxPagesToShow - 3;
            if ($slidingEnd >= $this->numPages) $slidingEnd = $this->numPages - 1;

            // Build the list of pages.
            $pages[] = $this->createPage(1, $this->currentPage == 1);
            if ($slidingStart > 2) {
                $pages[] = $this->createPageEllipsis();
            }
            for ($i = $slidingStart; $i <= $slidingEnd; $i++) {
                $pages[] = $this->createPage($i, $i == $this->currentPage);
            }
            if ($slidingEnd < $this->numPages - 1) {
                $pages[] = $this->createPageEllipsis();
            }
            $pages[] = $this->createPage($this->numPages, $this->currentPage == $this->numPages);
        }

        return $pages;
    }

    /**
     * Create a page data structure.
     *
     * @param int $pageNum
     * @param bool $isCurrent
     * @return Array
     */
    private function createPage($pageNum, $isCurrent = false)
    {
        return array(
            'num' => $pageNum,
            'isCurrent' => $isCurrent,
        );
    }

    /**
     * @return array
     */
    private function createPageEllipsis()
    {
        return array(
            'num' => '...',
            'isCurrent' => false,
        );
    }
}
