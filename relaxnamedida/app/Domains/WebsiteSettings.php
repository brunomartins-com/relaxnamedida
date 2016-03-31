<?php
namespace App\Domains;

use Illuminate\Database\Eloquent\Model;

class WebsiteSettings extends Model
{

    protected $table = 'websiteSettings';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
