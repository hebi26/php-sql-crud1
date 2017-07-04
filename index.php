<!DOCTYPE html>
<html lang="fr">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="script.js"></script>
      <link rel="stylesheet"href="style.css"/>
      <title>Formulaire sql</title>
    </head>
    <body>

      <?php include('conection.php');
      ?>
      <section class="container">
      <button class="btn" id="btn1">tout les clients</button><br>
      <div class="un">
      <?php
      $req = $pdo->query('SELECT * FROM clients');
      while ($data = $req->fetch()){

        echo (($data->id).' | '.($data->lastName).' | '.($data->firstName).' | '.($data->birthDate).'<br>');
      };
      ?>
      </div>

      <button class="btn" id="btn2">tout les spectacles</button><br>
      <div class='deux'>
      <?php
      $req = $pdo->query('SELECT * FROM showTypes');
      while ($data = $req->fetch()){

      echo (($data->id).' | '.($data->type).'<br>');
      };
      ?>
    </div>

      <button class="btn" id="btn3">20 premiers clients</button><br>
      <div class="trois">
      <?php
      $req = $pdo->query('SELECT * FROM clients ORDER BY id ASC LIMIT 20');
      while ($data = $req->fetch()){

        echo (($data->id).' | '.($data->lastName).' | '.($data->firstName).' | '.($data->birthDate).'<br>');
      };
      ?>
    </div>


      <button class="btn" id="btn4">clients qui ont une carte</button><br>
      <div class="quatre">
      <?php
      $req = $pdo->query('SELECT * FROM clients
                          JOIN cards
                          ON clients.cardNumber = cards.cardNumber
                          JOIN cardTypes
                          ON cards.cardTypesId = cardTypes.id
                          WHERE cardTypes.id=1');

      while ($data = $req->fetch()){

        echo (($data->id).' | '.($data->lastName).' | '.($data->firstName).' | '.($data->birthDate).'<br>');
      };
      ?>
      </div>


      <button class="btn" id="btn5">nom prenom client par M</button><br>
      <div class="cinq">
      <?php
      $req = $pdo->query('SELECT * FROM clients WHERE lastName LIKE "M%" ORDER BY lastName ASC');
      while ($data = $req->fetch()){

        echo ('<p>Nom :'.($data->lastName).' | Prenom : '.($data->firstName).'</p>');
      };
      ?>
      </div>


      <button class="btn" id="btn6">titre spectacle artiste date heure</button><br>
      <div class="six">
      <?php
      $req = $pdo->query('SELECT * FROM shows ORDER BY date ASC');
      while ($data = $req->fetch()){

        echo (($data->title).' par '.($data->performer).', le '.($data->date).' à '.($data->startTime).'<br>');
      };
      ?>
      </div>

      <button class="btn" id="btn7">tout clients avec carte </button><br>
      <div class="sept">
      <?php
      $req = $pdo->query('SELECT * FROM clients JOIN cards ON clients.cardNumber = cards.cardNumber JOIN cardTypes ON cards.cardTypesId = cardTypes.id');

      while ($data = $req->fetch()){

        $fidelite="";
        $numcard="";
        if($data->cardTypesId==1){
        $fidelite= ('oui | numéro de carte : '.($data->cardNumber));
        }
        else{
          $fidelite="non";
        }
        echo ('<p>Nom : '.($data->lastName).' | prenom : '.($data->firstName).' | date de naissance : '.($data->birthDate).' | carte  : '.($fidelite));

      };
      ?>
      </div>

    </section>

  </body>
  </html>
