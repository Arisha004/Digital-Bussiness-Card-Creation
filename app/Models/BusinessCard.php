<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'user_id', 'name', 'title', 'company', 'email', 'phone', 'website', 'social_links', 'theme','profile_pic', 'font_family','text_align','font_size','is_bold','is_italic'
    ];
protected $attributes = [
    'theme' => 't1',
];

    protected $casts = [
    'social_links' => 'array',
    'is_bold'      => 'boolean',
    'is_italic'    => 'boolean',
];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
