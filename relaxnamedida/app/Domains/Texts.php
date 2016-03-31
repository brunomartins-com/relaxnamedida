<?php
namespace App\Domains;

use Illuminate\Database\Eloquent\Model;

class Texts extends Model
{
    protected $table = 'texts';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
