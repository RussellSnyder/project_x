        <?php 
            function activePaginationCheck($pageNumber) {
                if (preg_match('/\?page='.preg_quote($pageNumber).'/', $_SERVER["REQUEST_URI"]) ) { 
                    echo 'active';
                } else if (!preg_match('/\?page=/', $_SERVER["REQUEST_URI"]) && $pageNumber == 1 ) { 
                    echo 'active';
                } else {
                    return false;
                }
            }
            function linkToPaginationRoute($pageNumber) {
                $pattern = '/\?page=\d/';
                if (preg_match('/\?page=\d/', $_SERVER["REQUEST_URI"]) ) { 
                    echo preg_replace($pattern, '?page=' . $pageNumber, $_SERVER['REQUEST_URI']);
                } else if($pageNumber != 1) {
                    echo $_SERVER['REQUEST_URI'] . '?page=' . $pageNumber;
                } else if($pageNumber == 1){
                    echo $_SERVER['REQUEST_URI']; 
                }

            }
        ?>
