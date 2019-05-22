<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Page extends Model {

   public static function insertData($data){

      $value=DB::table('task3')->where('orderid', $data['orderid'])->get();
      if($value->count() == 0){
         DB::table('task3')->insert($data);
      }
   }

}