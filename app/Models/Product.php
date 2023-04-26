<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Product extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'fullname', 
        'passport_type', 
        'passport_num',
        'issue_date',
        'expiry_date',
        'detail', 
        'image'
    ];
}