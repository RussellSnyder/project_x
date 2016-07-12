<?php 

    class Utilities_Pagination {
            private $pageName;
            private $table;

            private $nameOfGet;

            private $numTotalResults;
            private $numberOfPages;
            private $numberResultsPerPage;
            private $defaultResultsPerPage;

            // ['pageName, tablename, defaultNumberofResultsPerPage']
            function __construct($data =[], $numTotalResults) {
                // ex. page
                $this->pageName = $data[0];
                // ex. orders
                $this->table = $data[1];

                $this->defaultResultsPerPage = $data[2];

                $this->nameOfGet = $data[0].$data[1]; 

                // ex. orders
                $this->numTotalResults = $numTotalResults;


                $this->numberOfPages = $this->calculateNumberOfPages($this->numTotalResults);
            }


            private function activePaginationCheck($pageNumber) {
                $page = isset($_GET[$this->nameOfGet]) ? $_GET[$this->nameOfGet] : false ;
                if ($page == $pageNumber) { 
                    return 'active';
                } else if (!$page && $pageNumber == 1 ) { 
                    return 'active';
                } else {
                    return '';
                }
            }
            private function linkToPaginationRoute($pageNumber) {
                $pattern = '/\[&?]'.$this->nameOfGet.'=\d/';
                if (preg_match($pattern, $_SERVER["REQUEST_URI"]) ) { 
                    return preg_replace($pattern, '[&?]'.$this->nameOfGet.'=' . $pageNumber, $_SERVER['REQUEST_URI']);
                } else if($pageNumber != 1) {
                    return $_SERVER['REQUEST_URI'] . '&'.$this->nameOfGet.'=' . $pageNumber;
                } else if($pageNumber == 1){
                    return $_SERVER['REQUEST_URI']; 
                }

            }

            function calculateNumberOfPages($totalNumberItems) {
                $pageNumber = (isset($_GET[$this->nameOfGet])) ? $_GET[$this->nameOfGet] : 0 ;
                $resultsPerPageName = $this->table . 'resultsperpage';
                $resultsPerPageValue = (isset($_GET[$resultsPerPageName])) ? $_GET[$resultsPerPageName] : $this->defaultResultsPerPage;
                $result = round($totalNumberItems / $resultsPerPageValue);
                return $result;
            }


            public function calulateOffset($numberOfEntriePerPage) {
                $pageNumber = (isset($_GET[$this->nameOfGet])) ? $_GET[$this->nameOfGet] : false ;
                if ($pageNumber) {
                    return $pageNumber - 1;
                } else {
                    return 0;
                }
            }

            public function getNumberOfResultsPerPage() {
                $resultsPerPageName = $this->table . 'resultsperpage';
                $resultsPerPageValue = (isset($_GET[$resultsPerPageName])) ? $_GET[$resultsPerPageName] : $this->defaultResultsPerPage;
                return $resultsPerPageValue;
            }

            public function createPagination() {
                $paginationArray = [];
                $numberOfPages = $this->numberOfPages;
                for ($i = 1; $i <= $numberOfPages; $i++) {
                    $class = $this->activePaginationCheck($i);
                    $link = $this->linkToPaginationRoute($i);
                    array_push($paginationArray, '<li class="' . $class . '"><a href="' . $link . '">' . $i . '</a></li>');
                }
                return $paginationArray;
            }

            public function createDropdown($label, $total) {
                $resultsPerPageName = $this->table . 'resultsperpage';
                $resultsPerPageValue = (isset($_GET[$resultsPerPageName])) ? $_GET[$resultsPerPageName] : $this->defaultResultsPerPage;
                
                $numOptions = ($total < 10) ? $total : 10; 
                // Number of Results Per Page
                $startString = '<label for="'.$resultsPerPageName.'">' . $label . '</label>'
              . '<select class="form-control" id="'.$resultsPerPageName.'" name="' . $resultsPerPageName . '" value=' . $resultsPerPageValue . '
                >';
                $optionArray = [];
                for ($i = 1; $i <= $numOptions; $i++) {
                    if ($i == $resultsPerPageValue) {
                        $selected = 'selected';
                    } else {
                        $selected = 'none';
                    }

                   array_push($optionArray, '<option ' . $selected . '="' . $selected . '">' . $i . '</option>');
                }
                $middleString = implode(" ", $optionArray);
                $endString = '</select>';
                return $startString . $middleString . $endString;
            }
        }
    ?>
