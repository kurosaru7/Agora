<?php
  require('./view/template/top.php');
  require('./view/template/navbar.php');
 ?>
 <div class="container mt-3">
 <div class="row">
    <div class="col">
        <div class="card">
                <table class="table-fill mt-3 mb-3 ">
                    <thead>
                        <tr>
                            <th class="text-left">Sujets correspondants</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            if (isset($list) && $list != NULL) :
                                foreach ($list as $key => $value) :?>
                                <tr>
                                    <td class="text-left"><a href ="index.php?action=printSubject&id=<?=$value["id"]?>"><?=$value["nom"]?></a><font color="purple"> | Sujet créé par :  </font><a href="./index.php?action=myProfile&pseudo=<?=getUserNameById($value["profil"])["pseudo"]?>"><?=getUserNameById($value["profil"])["pseudo"]?></a><font color="purple"> | Créé le : </font><?=$value["dateS"]?> | <font color="purple">Catégorie d'appartenance </font> : <?= getCatNameById($value['categorie'])['nom'];?></td>
                                </tr>
                            <?php $i++; endforeach; 
                            else :?>
                                <tr>
                                    <td>Auncun sujet correspondant</td> 
                                </tr>
                            <?php endif;
                            ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="col">
        <div class="card">
                <table class="table-fill mt-3 mb-3 ">
                    <thead>
                        <tr>
                            <th class="text-left">Profils correspondants</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            if (isset($profils) && $profils != NULL) :
                                foreach ($profils as $key => $value) :?>
                                <tr>
                                    <td class="text-left"><a href="./index.php?action=myProfile&pseudo=<?=$value["pseudo"]?>"><?=$value["pseudo"]?></a> Score : <?=  $value["score"]?></td>
                                </tr>
                        <?php 
                            $i++;
                            endforeach;
                            else :?>
                            <tr>
                                <td>Auncun profil correspondant</td> 
                            </tr>
                        <?php endif;
                        ?>
                    </tbody>
                </table>
        </div>
</div>
</div>
 </div>
