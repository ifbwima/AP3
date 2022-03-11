<br>
<div class="container">
  <div class="row">
    <div class="col">
      <form action="./?action=rapport" method="POST">
        <div class="card w-80">
          <div class="card-header">
          <h5 class="card-title text-primary">Création de Rapport</h5>
          </div>
          <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="form-group">
                  <input type="date" name="date" placeholder="date" class="form-control" id="date">
                </div>
              </li>
          </ul>
          <div class="card-body">
            <select class="form-select" name="motif" id="motif-select">
                <option value="">--Choisissez un Motif--</option>
                <option value="Demande du medecin">Demande du medecin</option>
                <option value="Recommandation de confrère">Recommandation de confrère</option>
                <option value="Prise de contact">Prise de contact</option>
                <option value="Visite annuelle">Visite annuelle</option>
                <option value="Installation nouvelle">Installation nouvelle</option>
                <option value="Installation récente">Installation récente</option>
            </select><br>
            <div class="form-group">
              <textarea class="form-control" name= "bilan" placeholder="Bilan " id="exampleFormControlTextarea1" rows="3"></textarea>
            </div><br>

            <select class="form-select" name="medecin" id="medecin-select">
                <option value="">--Choisissez un Medecin--</option>
                <?php for($i=0; $i<count($listemed); $i++)
                {
                    print("<option value=".$listemed[$i]->getid().">".$listemed[$i]->getnom()." ".$listemed[$i]->getprenom()."</option>");
                }?>
            </select><br>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
        </div>
      </form>


    </div>
    <div class="col">

      <form action="./?action=rapport" method="POST">
          <div class="card w-80">
            <div class="card-header">
            <h5 class="card-title text-primary">Recherche de Rapport/Modification</h5>
            </div>

            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="form-group">
                  <small id="date2" class="form-text text-muted">selectionner une date</small>
                  <input type="date" name="date2" placeholder="date" class="form-control" id="date2"><br>
                  <button type="submit" class="btn btn-primary">ok</button>
                </div>
              </li>
            </ul>
            <div class="card-body">
              <?php
              if(!empty($listerapport))
              {?>

              <table style="width: 100%" class="table">
                <thead>
                    <tr>
                    <th scope="col">Motif</th>
                    <th scope="col">Bilan</th>
                    <th scope="col">Medecin</th>
                    </tr>
                </thead>
                <tbody>

                 <?php for($i=0; $i<count($listerapport); $i++)
                {
                    $medecin = daomedecin::getmedecinbyid($listerapport[$i]->getidmedecin());

                    print("<tr>
                    <th scope=\"row\" class=\"text-primary\">".$listerapport[$i]->getmotif()."</th>
                    <td>".$listerapport[$i]->getbilan()."</td>
                    <td>".$medecin->getnom()."</td>
                    <td><a href=\"?delete=".$listerapport[$i]->getid()."\"><img src=\"./image/trash.jpg\" width='22'></></td>
                    <td>
                        <a href=\"./?idrapport=".$listerapport[$i]->getid()."\"> 
                            <img src=\"./image/crayon.png\" width=20/>
                        <a/>
                    </td>
                    </tr>");       
                }?>

                </tbody>
              </table>

              <?php }
              else
              {
                print("<p class=\"card-text text-muted\">Aucun rapport à cette date</p>");
              }
              ?>
            </div>
          </div>
        </form>

    </div>
  </div>
</div>
<?php if(isset($_GET["delete"])){
    print("zizi");
    daorapport::deleterapport($_GET["delete"]);

}?>
