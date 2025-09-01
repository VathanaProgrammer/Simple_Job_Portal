<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    // Specify the table name explicitly
    protected $table = 'tbl_jobs';

    // Optional: allow mass assignment
    protected $fillable = [
        'user_id', 'job_category_id', 'title', 'description', 'location', 'employment_type', 'salary_range', 'status'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Job_categories::class, 'job_category_id');
    }
}
