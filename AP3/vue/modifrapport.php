<?php
$medecin = daomedecin::getmedecinbyid($rapport->getidmedecin());
print(
    "<br><br><form action=\"./?action=modifrapport\" method=\"POST\">
        <div class=\"card w-80\">
            <div class=\"card-body\">
                <div class=\"card-header\">
                    <h5>Données du rapport</h5 >
                </div>
                <div hidden class=\"form-group\">
                    <input name=\"id\" value=".$rapport->getid()." class=\"form-control\">
                </div><br>
                <div class=\"form-group\">
                    <input type=\"date\" name=\"datemod\" value=".$rapport->getdate()." class=\"form-control\">
                </div><br>

                <select class=\"form-select\" name=\"motifmod\" id=\"motif-select\">
                    <option value=\"".$rapport->getmotif()."\">--".$rapport->getmotif()."--</option>
                    <option value=\"Demande du medecin\">Demande du medecin</option>
                    <option value=\"Recommandation de confrère\">Recommandation de confrère</option>
                    <option value=\"Prise de contact\">Prise de contact</option>
                    <option value=\"Visite annuelle\">Visite annuelle</option>
                    <option value=\"Installation nouvelle\">Installation nouvelle</option>
                    <option value=\"Installation récente\">Installation récente</option>
                </select><br>

                <div class=\"form-group\">
                    <input type=\"text\" name=\"bilanmod\" value=\"".$rapport->getbilan()."\" class=\"form-control\">
                </div><br>

                <select class=\"form-select\" name=\"medecin\" id=\"medecin-select\">
                <option value=\"".$medecin->getid()."\">--".$medecin->getnom()." ".$medecin->getprenom()."--</option>"
                );
                for($i=0; $i<count($listemed); $i++)
                {
                    print("<option value=".$listemed[$i]->getid().">".$listemed[$i]->getnom()." ".$listemed[$i]->getprenom()."</option>");
                }
                print(
                "</select><br>


                <div class=\"card-header\">
                    <h5>Médicaments offerts</h5 >
                </div><br>");

                for($i=0; $i<3; $i++)
                {

                    if(isset($lesofferts[$i]))
                    {
                        print(
                        "<select class=\"form-select\" name=\"medicament".$i."\" id=\"medicament-select".$i."\">
                        <option value=\"".$lesofferts[$i]->getmedicament()->getid()."\"    data-toggle=\"tooltip\" data-placement=\"top\" title=\"id Famille: ".$lesofferts[$i]->getmedicament()->getidfam()."\nComposition: ".$lesofferts[$i]->getmedicament()->getcomposition()."\nEffets: ".$lesofferts[$i]->getmedicament()->geteffets()."\nContre Indications: ".$lesofferts[$i]->getmedicament()->getind()."\"     >--".$lesofferts[$i]->getmedicament()->getnom()."--</option>"
                        );
                        
                        for($j=0; $j<count($listemedicament); $j++)
                        {
                            print("<option value=\"".$listemedicament[$j]->getid()."\"      data-toggle=\"tooltip\" data-placement=\"top\" title=\"id Famille: ".$listemedicament[$j]->getidfam()."\nComposition: ".$listemedicament[$j]->getcomposition()."\nEffets: ".$listemedicament[$j]->geteffets()."\nContre Indications: ".$listemedicament[$j]->getind()."\"     >".$listemedicament[$j]->getnom()."</option>");
                        }
                        print(
                        "</select>
                        <div class=\"form-group\">
                            <input name=\"quantite".$i."\" value=".$lesofferts[$i]->getquantite()." class=\"form-control\">
                        </div><br>");
                    }
                    else
                    {
                        print(
                            "<select class=\"form-select\" name=\"medicament".$i."\" id=\"medicament-select".$i."\">
                            <option value=\"\">--selectionnez un médicament--</option>"
                        );
                        
                        for($j=0; $j<count($listemedicament); $j++)
                        {
                            print("<option value=\"".$listemedicament[$j]->getid()."\"      data-toggle=\"tooltip\" data-placement=\"top\" title=\"id Famille: ".$listemedicament[$j]->getidfam()."\nComposition: ".$listemedicament[$j]->getcomposition()."\nEffets: ".$listemedicament[$j]->geteffets()."\nContre Indications: ".$listemedicament[$j]->getind()."\"     >".$listemedicament[$j]->getnom()."</option>");
                        }
                        print(
                        "</select>
                        <div class=\"form-group\">
                            <input name=\"quantite".$i."\" placeholder=quantité class=\"form-control\">
                        </div><br>");
                    }
                }

                print(
                "<button type=\"submit\" class=\"btn btn-primary\">Enregistrer</button>
            </div>
        </div>
    </form>
");