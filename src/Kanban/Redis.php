<?php

namespace Kanban;

class Redis extends \Redis
{
   public function getUser( int $user_id ): array
   {
      $user = json_decode($this->get("user:$user_id"), true);

      if( !$user ) return [];
      $user['id'] = $user_id;

      return $user;
   }

   public function getCard( int $card_id ): array
   {
      return json_decode($this->get("card:$card_id"), true) ?? [];
   }



   public function getUsers(): array
   {
      $user_keys = $this->keys("user:*");
      $users = [];
      foreach( $user_keys as $user_id)
      {
         $id = substr( $user_id, 5);
         $user = $this->getUser( $id );
         if( $user ) $users[] = $user;
      }
      return $users;
   }

   public function createUser( array $user ): int
   {
      $user_id = 1;
      while( $this->exists("user:$user_id") ) $user_id++;
      $this->set("user:$user_id", json_encode($user) );
      return $user_id;
   }


   public function deleteUser( int $user_id )
   {
      $this->del( "user:$user_id" );
   }
}