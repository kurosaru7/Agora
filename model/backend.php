<?php

function dbConnect() {
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=agora;charset=utf8','root','');
  }
  catch(Exception $e)
  {
    die('Erreur :' .$e->getMessage());
  }
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function delSubject($subjectId) {
  $db = dbConnect();
  $req = $db->prepare("DELETE FROM sujet WHERE id = :id");
  $req->execute(array(
    ":id" => $subjectId,
  ));
}

// SUPPRIMER UN UTILISATEUR ADMIN
function deleteUser($userPseudo){
  $db = dbConnect();
  $req = $db->prepare("DELETE FROM profil WHERE pseudo = :pseudo");
  $req->execute(array(
    ":pseudo" => $userPseudo,
  ));
}

// MODIFIER LA CATEGORIE D UN SUJET
function modifySubjectCategory($subjectId){
  $db= dbConnect();
  $req = $db->prepare("UPDATE sujet SET categorie = :category WHERE sujet.id = :id");
  $req->execute(array(
    ":id" => $subjectId,
    ":category" => $categoryId,
  ));
}

//MODIFIER LE NOM D UN SUJET
function modifySubjectName($subjectId){
  $db = dbConnect();
  $req = $db->prepare("UPDATE sujet SET nom = :nom WHERE sujet.id = :id ");
  $req->execute(array(
    ":id" => $subjectId,
    ":nom" => $nameSubject,
  ));
}

function getStatusSubject ($subjectId) {
$db = dbConnect();
$req = $db->prepare("SELECT statut FROM sujet WHERE id =:id");
$req->execute(array(
  ":id" => $subjectId,
));
}
//FERMER UN SUJET
function closeSubject($subjectId) {
$db = dbConnect();
$req = $db->prepare("UPDATE `sujet` SET `statut` = 'ferme' WHERE `sujet`.`id` = :id");
$req->execute(array(
  ":id" => $subjectId,
));
}

// function getIdSujet($idReponse){
//   $db = dbConnect();
//   $req = $db->prepare('SELECT * FROM reponse WHERE id = :idReponse ');
//   $req->execute(array(
//     'idReponse' => $idReponse,
//   ));
//   return $req;
// }

function delResponse ($responseId) {
  $db = dbConnect();
  $req = $db->prepare("DELETE FROM reponse WHERE id = :id");
  $req->execute(array(
  ":id" => $responseId,
  ));
}

function delCommentary ($responseId) {
  $db = dbConnect();
  $req = $db->prepare("DELETE FROM commentaire WHERE reponse =:id");
  $req->execute(array(
  ":id" => $responseId,
  ));
}

function delCommentarywithID($responseId)
{
  $db = dbConnect();
  $req = $db->prepare("DELETE FROM commentaire WHERE id =:id");
  $req->execute(array(
    ":id" => $responseId,
  ));
}

function selectInfoUser($user){
  $db = dbConnect();
  $req = $db->prepare("SELECT * FROM profil WHERE pseudo LIKE :pseudo");
  $req->execute(array(
    ":pseudo" => $user,
  ));
  $result = $req->fetch(PDO::FETCH_ASSOC);
  return $result;
}


function isRegister($pseudo,$password){
$db = dbConnect();
$req = $db->prepare('SELECT * FROM profil WHERE pseudo = :pseudo AND password = :password');
$req->execute(array(
  'pseudo' => $pseudo,
  'password' => $password
));
return $req;
}

function addSubject($nom,$profil,$categorie,$adresse){
  $db = dbConnect();
  $query = $db->prepare('INSERT INTO sujet(nom,dateS,statut,profil,categorie,adresse) VALUES(:nom,:dateS,"ouvert",:profil,:categorie,:adresse)');
  $query->execute(array(
    'nom' => $nom,
    'profil' => $profil,
    'categorie' => $categorie,
    'adresse' => $adresse,
    'dateS' => date('Y-m-d H:i:s'),
  ));
}

function getCategories(){
  $db = dbConnect();
  $query = $db->query('SELECT * FROM categorie');
  return $query;
}

function printSubjectbycategories($idCategorie){
  $db = dbConnect();
  $query = $db->prepare('SELECT S.id AS idSujet,S.nom,S.dateS,S.profil,C.nom AS nom_categorie,P.pseudo
                      FROM sujet S JOIN categorie C
                      ON S.categorie = C.id
                      JOIN profil P
                      ON P.id = S.profil
                      WHERE C.id = :idCategorie
                      ORDER BY dateS');
  $query->execute(array(
    'idCategorie' => $idCategorie
  ));
  return $query;
}
function addUser($pseudo,$pw){
  $db = dbConnect();
  $query = $db->prepare('INSERT INTO profil(pseudo,password,datep,statut) VALUES(:pseudo,:password,:datep,"visiteur")');
  $query->execute(array(
    'pseudo' => $pseudo,
    'password' => $pw,
    'datep' => date('Y-m-d'),
  ));
}

function printLastSubjects(){
  $db = dbConnect();
  $query = $db->query('SELECT S.id AS idSujet,S.nom,S.dateS,S.profil,C.nom AS nom_categorie,P.pseudo
                      FROM sujet S JOIN categorie C
                      ON S.categorie = C.id
                      JOIN profil P
                      ON P.id = S.profil
                      ORDER BY dateS DESC
                      LIMIT 5');
  return $query;
}

function printSubject($id){
$db = dbConnect();
$query = $db->prepare('SELECT S.nom AS nomSujet ,S.id AS idSujet,P.id AS idProfil,P.pseudo AS pseudo,P.score AS scoreProfil ,P.datep AS dateInscription ,P.avatar AS avatar,S.dateS AS dateCreationSujet,S.statut AS statutSujet,S.categorie AS idcategorieSujet,S.adresse AS adresseSujet,CA.nom AS nomCategorie FROM categorie CA JOIN sujet S ON CA.id = S.categorie JOIN profil P ON S.profil = P.id WHERE S.id = :idSujet ');
$query->execute(array(
  'idSujet' => $id
));
return $query;
}

function getReponse($id){
  $db = dbConnect();
  $query = $db->prepare('SELECT R.id AS idReponse,R.adresse AS adresseReponse,R.points AS pointsReponse,R.datem AS dateReponse,P.score AS profilPoints, P.pseudo AS pseudoProfil,P.id as idProfilReponse,P.datep AS dateInscription,P.avatar AS avatar
                         FROM reponse R JOIN sujet S
                         ON R.sujet = S.id
                         JOIN profil P
                         ON R.profil = P.id
                         WHERE sujet = :sujet
                         ORDER BY dateReponse');
  $query->execute(array(
    'sujet' => $id
  ));
return $query;
}


function getComment($id){
  $db = dbConnect();
  $query = $db->prepare('SELECT C.id AS idCommentaire,C.adresse AS adresseCommentaire,C.points AS pointsCommentaire,C.datecom AS dateCommentaire,P.score AS profilPointsCommentaire, P.pseudo AS pseudoCommentaire,P.datep AS dateInscriptionCommentaire,P.avatar AS avatar,P.id AS idProfil
                         FROM reponse R
                         JOIN commentaire C
                         ON C.reponse = R.id
                         JOIN profil P
                         ON C.profil = P.id
                         WHERE R.id = :reponse
                         ORDER BY dateCommentaire');
  $query->execute(array(
    'reponse' => $id
  ));
return $query;
}


function deleteTuppleUser($profil){
  $data = selectInfoUser($profil);
  $idProfil = $data['id'];
  $db = dbConnect();
  try {
    $query1 = $db->prepare('DELETE FROM commentaire WHERE profil = :id');
    $query1->execute(array(
      'id' => $idProfil
    ));

  } catch (PDOException $ex){
    echo $ex." 231";
  }

  try{
  $query2 = $db->prepare('DELETE FROM reponse WHERE profil = :id');
  $query2->execute(array(
    'id' => $idProfil
  ));
} catch (PDOException $ex){
  echo $ex." 240";
}
try{
  $query3 = $db->prepare('DELETE FROM sujet WHERE profil = :id');
  $query3->execute(array(
    'id' => $idProfil
  ));
} catch (PDOException $ex){
  echo $ex." 248";
}
$query7 = $db->prepare('DELETE FROM discuter WHERE profil = 
    (SELECT id FROM profil WHERE id = :id)
  ');
  $query7->execute(array(
    'id' => $idProfil
  ));
try{
  $query5 = $db->prepare('DELETE FROM courrier WHERE conversation = 
    (SELECT id FROM conversation WHERE id = 
      (SELECT conversation FROM discuter WHERE profil = 
        (SELECT id FROM profil WHERE id = :id )
      )
    )'
  );
  $query5->execute(array(
    'id' => $idProfil
  ));
} catch (PDOException $ex){
  echo $ex." 271";
}

try{
  $query6 = $db->prepare('DELETE FROM conversation WHERE id = 
    (SELECT conversation FROM discuter WHERE profil = 
      (SELECT id FROM profil WHERE id = :id)
    )
  ');
  $query6->execute(array(
    'id' => $idProfil
  ));
} catch (PDOException $ex){
  echo $ex." 281";
}
try{
  $query7 = $db->prepare('DELETE FROM discuter WHERE profil = 
    (SELECT id FROM profil WHERE id = :id)
  ');
  $query7->execute(array(
    'id' => $idProfil
  ));
} catch (PDOException $ex){
  echo $ex." 294";
}
$query4 = $db->prepare('DELETE FROM profil WHERE id LIKE :id ');
  $query4->execute(array(
    'id' => $idProfil
  ));
  return 1;
}

function  getSubjectsByCategory($cat){
  $db = dbConnect();
  $query = $db->prepare('SELECT * FROM sujet WHERE categorie = (SELECT id FROM categorie WHERE nom LIKE :categorie)');
  $query->execute(array(
    'categorie' => $cat,
  ));
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
function getUserById($id){
  $db = dbConnect();
  $query = $db->prepare('SELECT * FROM profil WHERE id = :id ');
  $query->execute(array(
    'id' => $id,
  ));
  $result = $query->fetch(PDO::FETCH_ASSOC);
  return $result;
}
function createAdmin($pseudo,$pw){
  $pseudo = $_GET['pseudo'];
  $pw = $_GET['pw'];
  $pwV = $_GET['pwV'];
  $db = dbConnect();
  $query = $db->prepare('INSERT INTO profil(pseudo,password,datep,statut) VALUES(:pseudo,:password,:datep,"admin")');
  $query->execute(array(
    'pseudo' => $pseudo,
    'password' => $pw,
    'datep' => date('Y-m-d')
  ));
}

function isSubjectExist($idSujet){
  $db = dbConnect();
  $query = $db->prepare('SELECT * FROM sujet WHERE id = :id');
  $query->execute(array(
    'id' => $idSujet,
  ));
  return $query;
}




function addAdmin($pseudo,$pw){
  $db = dbConnect();
  $query = $db->prepare('INSERT INTO profil(pseudo,password,datep,statut) VALUES(:pseudo,:password,:datep,"admin")');
  $query->execute(array(
    'pseudo' => $pseudo,
    'password' => $pw,
    'datep' => date('Y-m-d')
  ));
}
//FERMER UN SUJET
function updateUsr($usrInfos) {
  $db = dbConnect();
  $req = $db->prepare("UPDATE `profil` SET mail = :mail, telephone = :telephone, pseudo = :pseudo WHERE id = :id");
  $req->execute(array(
    ":id" => $usrInfos['id'],
    ":pseudo" => $usrInfos['pseudo'],
    ":mail" => $usrInfos['mail'],
    ":telephone" => $usrInfos['telephone']
  ));
  }

function getConversationsOfSomeone($idProfil){
  $db = dbConnect();
  $query = $db->prepare('SELECT P.pseudo AS pseudo, D.conversation AS idConversation
                  FROM discuter D
                  JOIN profil P
                  ON D.profil = P.id
                  WHERE D.conversation IN (SELECT D.conversation
                                          FROM discuter D
                                          WHERE D.profil = :idProfil)
                  AND D.profil != :idProfil');
  $query->execute(array(
    'idProfil' => $idProfil
  ));
  return $query;
}
function reportContent($type, $targetId, $id){
  $db = dbConnect();
  $query = $db->prepare('INSERT INTO signaler(dateSi,type,profil,id_contenu) VALUES(:dateSi,:type,:profil,:id_contenu)');
  $query->execute(array(
    'dateSi' => date('Y-m-d H:i:s'),
    'type' => $type,
    'profil' => $id,
    'id_contenu' => $targetId
  ));
}
function getReportListTupples(){
  $db = dbConnect();
  $query = $db->query('SELECT * FROM signaler');
  $query = $query->fetchAll(PDO::FETCH_ASSOC);
  return $query;
}
function getUserNameById($id) {
  $db = dbConnect();
  $req = $db->prepare("SELECT pseudo FROM profil WHERE id = :id");
  $req->execute(array(
    ":id" => $id,
  ));
  $result = $req->fetch(PDO::FETCH_ASSOC);
  return $result;
}
function deleteReportDB($id){
  $db = dbConnect();
  $query = $db->prepare('DELETE FROM signaler WHERE id = :id');
  $query->execute(array(
    'id'=>$id
  ));
}
function searchDB($terme){
  $db = dbConnect();
  $query = $db->prepare('SELECT * FROM sujet WHERE nom LIKE :nom');
  $query->execute(array(
    'nom'=> "%".$terme."%"
  ));
  $query = $query->fetchAll(PDO::FETCH_ASSOC);
  return $query;
}
function searchCreatorDB($profil){
  $db = dbConnect();
  $query = $db->prepare('SELECT * FROM sujet WHERE profil = :profil');
  $query->execute(array(
    'profil'=> $profil
  ));
  $query = $query->fetchAll(PDO::FETCH_ASSOC);
  return $query;
}

function searchNameDB($terme){
  $db = dbConnect();
  $query = $db->prepare('SELECT pseudo,score FROM profil WHERE pseudo LIKE :nom');
  $query->execute(array(
    'nom'=> "%".$terme."%"
  ));
  $query =$query->fetchAll(PDO::FETCH_ASSOC);
  return $query;
}

function getCatNameById($id){
  $db = dbConnect();
  $query = $db->prepare('SELECT nom FROM categorie WHERE id = :id');
  $query->execute(array(
    'id'=> $id
  ));
  $query = $query->fetch(PDO::FETCH_ASSOC);
  return $query;
}
function checkVote($idUser,$idContent,$type){
  $db = dbConnect();
  $query = $db->prepare('SELECT * FROM aime WHERE profil = :idUser AND contenu = :idContent AND typeC = :typeC');
  $query->execute(array(
    'idUser'=> $idUser,
    'idContent'=> $idContent,
    'typeC'=> $type
  ));
  $return = $query->fetch(PDO::FETCH_ASSOC);
  if ($return == NULL) {
    $return = false;
  }
  return $return;
}
function addPointContent($table, $idUser, $idContent, $type){
  $db = dbConnect();
  $query = $db->prepare('SELECT points FROM '.$table.' WHERE id = :idContent');
  $query->execute(array(
    'idContent'=> $idContent
  ));
  $points = $query->fetch(PDO::FETCH_ASSOC);
  $points = $points['points'];
  $points ++;

  $query = $db->prepare('UPDATE '.$table.'  SET points = :points  WHERE id = :idContent');
  $query->execute(array(
    'idContent'=> $idContent,
    'points'=>$points
  ));

  $query = $db->prepare('INSERT INTO aime(profil, contenu, typeC) VALUES(:idUser, :idContent, :typeC)');
  $query->execute(array(
    'typeC'=> $type,
    'idUser'=>$idUser,
    'idContent'=>$idContent
  ));
  $query = $db->prepare('SELECT profil FROM '.$table.' WHERE id = :idContent');
  $query->execute(array(
    'idContent'=> $idContent
  ));
  $profil =  $query->fetch(PDO::FETCH_ASSOC);
  $profil = $profil['profil'];

  $query = $db->prepare('UPDATE profil SET score = score+1  WHERE id = :profil');
  $query->execute(array(
    'profil'=> $profil
  ));


  

  return true;

}


function updateAvatar($id,$imageC){
  $bdd = dbConnect();
  $query = $bdd->prepare('UPDATE profil SET avatar = :imageC WHERE id = :id');
  $query->execute(array(
    'imageC' => $imageC,
    'id' => $id
  ));
}

function getAconversation($idConversation){
  $db = dbConnect();
  $query = $db->prepare('SELECT sujet,dateC,adresse,datecou
                        FROM conversation CON
                        JOIN courrier COU
                        ON CON.id = COU.conversation
                        WHERE CON.id = :idConversation');
  $query->execute(array(
    'idConversation' => $idConversation
  ));
  return $query;
}

function createConversationbdd($sender,$receiver,$object,$content){
  $db = dbConnect();

  $query1 = $db->prepare('INSERT INTO conversation(sujet,dateC) VALUES(:object,:dateC)');
  $query1->execute(array(
    'object' => $object,
    'dateC' => date("Y-m-d")
  ));

  $query2 = $db->query('SELECT MAX(id) AS max_id FROM conversation');
  $result = $query2->fetch(PDO::FETCH_ASSOC);
  $id_conv = $result['max_id'];

  $query3 = $db->prepare('INSERT INTO discuter(conversation,profil) VALUES(:conversation,:sender)');
  $query3->execute(array(
    'sender' => $sender,
    'conversation' => $id_conv
  ));

  $query4 = $db->prepare('INSERT INTO discuter(conversation,profil) VALUES(:conversation,:receiver)');
  $query4->execute(array(
    'receiver' => $receiver,
    'conversation' => $id_conv
  ));

  $query5 = $db->prepare('INSERT INTO courrier(conversation,adresse,datecou) VALUES(:conversation,:adresse,:datecou)');
  $query5->execute(array(
    'conversation' => $id_conv,
    'adresse' => $content,
    'datecou' => date("Y-m-d H:i:s")
  ));

}

function isConversationExist($sender,$receiver){
  $db = dbConnect();
  $query = $db->prepare('SELECT conversation 
                        from discuter 
                        where profil = :sender
                        AND conversation IN (SELECT conversation from discuter where profil = :receiver) LIMIT 1');
  $query->execute(array(
    'sender' => $sender,
    'receiver' => $receiver
  ));
  $result = $query->fetch(PDO::FETCH_ASSOC);
  return $result;
}

?>
