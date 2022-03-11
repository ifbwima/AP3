<br><div class="d-flex justify-content-center">
    <table style="width: 88%" class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Adresse</th>
        <th scope="col">Tel</th>
        <th scope="col">Spécialité Complementaire</th>
        <th scope="col">Rapports</th>
        </tr>
    </thead>
    <tbody>
    <?php for($i=0; $i<count($listemed); $i++)
        {
            print("<tr>
            <th scope=\"row\" class=\"text-primary\">".$listemed[$i]->getid()."</th>
            <td>".$listemed[$i]->getnom()."</td>
            <td>".$listemed[$i]->getprenom()."</td>
            <td>".$listemed[$i]->getadresse()."</td>
            <td>".$listemed[$i]->gettel()."</td>
            <td>".$listemed[$i]->getspecialite()."</td>
            <td>
                <a href=\"./?idmedecinrap=".$listemed[$i]->getid()."\">
                    <img src=\"./image/rapport.png\" width=15/>
                <a/>
            </td>
            <td>
                <a href=\"./?idmedecinmod=".$listemed[$i]->getid()."\">
                    <img src=\"./image/crayon.png\" width=15/>
                <a/>
            </td>
            </tr>");

            
        }?>
    </tbody>
    </table>
</div>