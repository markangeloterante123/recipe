<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
	protected $table = 'tbl_category';

	protected $primaryKey = 'id';

	protected $allowedFields = ['category'];

}

?>