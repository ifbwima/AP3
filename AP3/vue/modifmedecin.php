<?php
print(
    "<form action=\"./?action=modifmedecin\" method=\"POST\">
        <div class=\"card w-80\">
            <div class=\"card-body\">
                <div hidden class=\"form-group\">
                    <input name=\"id\" value=".$med->getid()." class=\"form-control\">
                </div><br>
                <div class=\"form-group\">
                    <input type=\"text\" name=\"nom\" value=".$med->getnom()." class=\"form-control\">
                </div><br>
                <div class=\"form-group\">
                    <input type=\"text\" name=\"prenom\" value=".$med->getprenom()." class=\"form-control\">
                </div><br>
                <div class=\"form-group\">
                    <input type=\"text\" name=\"adresse\" value=\"".$med->getadresse()."\" class=\"form-control\">
                </div><br>
                <div class=\"form-group\">
                    <input type=\"text\" name=\"tel\" value=".$med->gettel()." class=\"form-control\">
                </div><br>
                <div class=\"form-group\">
                    <input type=\"text\" name=\"specialite\" value=\"".$med->getspecialite()."\" class=\"form-control\">
                </div><br>

                <button type=\"submit\" class=\"btn btn-primary\">Enregistrer</button>
            </div>
        </div>
    </form>
");