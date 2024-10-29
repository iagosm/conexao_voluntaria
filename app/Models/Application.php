<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'opportunity_id',
        'name',
        'phone',
        'email',
        'cpf',
    ];

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
