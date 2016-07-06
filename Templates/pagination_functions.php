        <?php 
            function activePaginationCheck($pageNumber) {
                if (preg_match('/\?page='.preg_quote($pageNumber).'/', $_SERVER["REQUEST_URI"]) ) { 
                    return 'active';
                } else if (!preg_match('/\?page=/', $_SERVER["REQUEST_URI"]) && $pageNumber == 1 ) { 
                    return 'active';
                } else {
                    return false;
                }
            }
            function linkToPaginationRoute($pageNumber) {
                $pattern = '/\?page=\d/';
                if (preg_match('/\?page=\d/', $_SERVER["REQUEST_URI"]) ) { 
                    return preg_replace($pattern, '?page=' . $pageNumber, $_SERVER['REQUEST_URI']);
                } else if($pageNumber != 1) {
                    return $_SERVER['REQUEST_URI'] . '?page=' . $pageNumber;
                } else if($pageNumber == 1){
                    return $_SERVER['REQUEST_URI']; 
                }

            }
        ?>
