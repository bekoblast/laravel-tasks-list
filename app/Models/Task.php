<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'long_description'
    ];

    //custom function for marking task as completed!
    public function toggleCompleted() {
        $this->completed = !$this->completed;
        $this->save();
    }
}
