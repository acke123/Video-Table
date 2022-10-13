<?php

class Database
{
   public function getConnection(){
      return mysqli_connect('localhost', 'root', '', 'ackedb');
}
}