<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
class Post extends Model
{
    

    public function CheckAuth($id) {
        if($id == Auth::id()) {
            return true;
        }
        return false;
    }
}
