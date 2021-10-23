<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
	protected $table = 'tbl_recipe';

	protected $primaryKey = 'id';

	protected $allowedFields = ['category', 'recipeName', 'recipeImg',
                                'recipeDirection', 'recipeTime', 'recipeIngridients'
                                ];

}

?>