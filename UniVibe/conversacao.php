<?php

  function getConversas($id_usuario, $conn)
  {
      $sql = "SELECT c.*, u.*
              FROM conversação c
              INNER JOIN usuarios u ON (c.usuario1 = u.id_usuario OR c.usuario2 = u.id_usuario)
              WHERE c.usuario1 = ? OR c.usuario2 = ?
              ORDER BY c.id_conversa DESC";
      
      $stmt = $conn->prepare($sql);
      $stmt->execute([$id_usuario, $id_usuario]);

      $conversas = [];
      
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $conversas[] = $row;
      }

      return $conversas;
  }

    
    
?>