<?php
    class Form {
        public function Input($size, $name, $label, $type, $placeholder, $value) {
            $un = '<div class="col-'.$size.'">';
            $deux = '';
            $trois =  '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" class="form-control" id="'.$name.'" required>
                        <div class="invalid-feedback">'.$placeholder.'.</div>
                      </div>';

    
            if ($type != 'submit') {
    
                $deux = '<label for="'.$name.'" class="form-label">'.$label.'</label>';
            }

            if ($type == 'submit') {
                $trois = '<button class="btn btn-primary w-100" value="'.$value.'"  type="'.$type.'">'.$placeholder.'</button>
              </div>';
            } 
    
            return $un.$deux.$trois;            
        }
    }
?>
