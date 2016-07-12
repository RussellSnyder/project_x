<?php 

    class Utilities_Sort {


    	// table you are sorting on
    	// this will prefix the gets in the url 
    	// so more than one table can be sorted on a page
        protected $table;

        protected $values = [];
        function __construct($table) {
            $this->table = $table;
        }

        public function getValue($value) {
        	return $this->values[$value];
        }

            // push to array to be accessed outside
        private function setValue($name, $value) {
			$this->values[$name]=$value;
        }

        public function createDropdown($label, $name, $values = []) {
            $sortName = $this->table . $name;
            $sortValue = (isset($_GET[$sortName])) ? $_GET[$sortName] : $values[0] ;

            $newValue = $this->setValue($sortName, $sortValue);
            $numOptions = count($values); 
            // Number of Results Per Page
            $startString = '<label for="'.$sortName.'">' . $label . '</label>'
          . '<select class="form-control" id="'.$sortName.'" name="' . $sortName . '" value=' . $sortValue . '
            >';
            $optionArray = [];
            foreach ($values as $value) {
                if ($value == $sortValue) {
                    $selected = 'selected';
                } else {
                    $selected = 'none';
                }

               array_push($optionArray, '<option ' . $selected . '="' . $selected . '">' . ucfirst($value) . '</option>');
            }
            $middleString = implode(" ", $optionArray);
            $endString = '</select>';
            return $startString . $middleString . $endString;
        }


    }
?>
