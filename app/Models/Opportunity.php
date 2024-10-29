<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        // Adicione outros campos conforme necessário
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
