<?php
  
   class Sendb extends SQLite3
   {
      function __construct()
      {
         $this->open('sendb.db');
      }
   }