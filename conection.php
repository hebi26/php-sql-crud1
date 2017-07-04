<?php
//-------------------- Connexion a la base de donnée-----------------//
      try{
          $pdo = new PDO('mysql:host=localhost;dbname=colyseum','root','coda');
          $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
          $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
          // echo 'connecté';
      }
      catch(PDOException $e){
          echo 'Connexion impossible';
      }
