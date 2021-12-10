<?php
  include "../config.php";
  class Controller {
    function getUsers(array $values) {
      $conn = config::getConnection();
      $sql = "select  user.name, user.id from user 
        inner join messages on messages.id_user2 = user.id
        where messages.id_user1 = :userId or messages.id_user2 = :userId and user.id != :userId
        group by user.id";
      $query = $conn->prepare($sql);
      $query->execute($values);
      $result = $query->fetchAll();
      return $result;
    }

    function getMessagesOfUser(array $values) {
      $conn = config::getConnection();
      $sql = "select * from messages inner join user on user.id = messages.id_user1
      where (messages.id_user1 = :sender and messages.id_user2 = :recv) or (messages.id_user1 = :recv and messages.id_user2 = :sender)
      order by date_msg";
      $query = $conn->prepare($sql);
      $query->execute($values);
      $result = $query->fetchAll();
      return $result;
    }
    function getUser(array $values) {
      $conn = config::getConnection();
      $sql = "select * from user where id = :id";
      $query = $conn->prepare($sql);
      $query->execute($values);
      $result = $query->fetch();
      return $result;
    }

    function sendMessage(array $values) {
      $conn = config::getConnection();
      $sql = "insert into messages (id_user1, id_user2, content) values (:sender, :recv, :content)";
      $query = $conn->prepare($sql);
      $query->execute($values);
    }
  }

//  select * from messages inner join user on user.id = messages.id_user1
//	where (messages.id_user1 = 1 and messages.id_user2 = 4) or (messages.id_user1 = 4 and messages.id_user2 = 1)
