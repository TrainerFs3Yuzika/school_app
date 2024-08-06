<?php
// app/Models/Faq.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message'];
}
