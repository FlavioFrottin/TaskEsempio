<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    
	protected $fillable = ['titolo','corpo','utente_id','completo'];
	
	
	public function user(){
		
		
		return $this->belongsTo('App\User');
		
		
		
	}
	
	
}
