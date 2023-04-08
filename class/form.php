<?php
// require_once('./class/database.php');

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

        public function select() {
            // init object class database
            $database = new Database();
            // connexion bdd
            $pdo = $database->connectDb();
            // create select requete
            $result = $database->select($pdo, 'ville_id, ville_nom', 'villes_france', ['1', '1']);
            // formalisation du résultat
            // $result = $result->fetchAll();
           
            // Verfier si l'email de l'utilisateur existe 

            ?>
            <div class="col-6"><label for="pet-select">Choisir votre ville:</label>

            <select id="pet-select" name="ville">
                <option value="">--Selectionner une ville--</option>
                <?php
                 while($res = $result->fetch(PDO::FETCH_ASSOC)
                 ) {
                ?>
                <option value="<?=$res['ville_id'];?>"><?=$res['ville_nom'];?></option>
                <?php }
                ?>
            </select>
            </div>
            <?php 
        }
    }
?>
