<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class doctor extends Model
{
    use HasFactory;
    use softDeletes;
    protected $primaryKey = 'id';
    protected $fillable=['id','name','email','dep_id','photo'];
    public function tablet(){
        return $this->hasOne(tablet::class,'doc_id','id')->withDefault(['tablet_name'=>'not']);
    }
    public function department(){
        return $this->belongsTo(department::class,'dep_id','dep_id');
    }
}
