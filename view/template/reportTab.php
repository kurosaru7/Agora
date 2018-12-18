<table id="reportTab" class="display">
    <thead>
        <tr>
            <th>Signalement</th>
            <th>Type</th>
            <th>Demandeur</th>
            <th>Date</th>
            <th>Contenu signalé</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($list as $key => $value) :?>
            <tr>
            
                <?php foreach ($value as $colonne => $valeur) :?>
                <td>
                <?= $valeur?>
                </td>
                <?php endforeach;?>
            </tr>
        <?php endforeach;?>
        
    </tbody>
</table>