<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\TranslatableConstantModelTrait;

class UserRole
{
    use TranslatableConstantModelTrait;

    const MANAGER = 1;

    const MODERATOR = 2;    

   	public static $data = array();
}

UserRole::loadData();
