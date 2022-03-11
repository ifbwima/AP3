<br><br>
<div class="card w-80">
    <div class="card-header">
        <h5 class="card-title text-primary"><?php print("Les Rapports de ".$med->getnom()." ".$med->getprenom())?></h5>
    </div>
    <div class="card-body">
        <?php
        if(!empty($lesrapports))
        {?>

        <table style="width: 100%" class="table">
        <thead>
            <tr>
            <th scope="col">Date</th>
            <th scope="col">Motif</th>
            <th scope="col">Bilan</th>
            </tr>
        </thead>
        <tbody>

            <?php for($i=0; $i<count($lesrapports); $i++)
        {
            print("<tr>
            <th scope=\"row\" class=\"text-primary\">".$lesrapports[$i]->getdate()."</th>
            <td>".$lesrapports[$i]->getmotif()."</td>
            <td>".$lesrapports[$i]->getbilan()."</td>
            </tr>");       
        }?>

        </tbody>
        </table>

        <?php }
        else
        {
        print("<p class=\"card-text text-muted\">Ce medecin n'a pas encore de rapport</p>");
        }
        ?>
    </div>
</div>