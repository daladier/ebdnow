<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $timestamps = false;

    public function deposit(float $value ) : Array {
    	$totalBefore = $this->amount ? $this->amount : 0;
    	$this->amount += number_format ($value,2,'.','');
    	$depos = $this->save();

    	$histor = auth()->user()->historics()->create([
    		'type' => 'I',
    		'amount' => $value,
    		'total_before' => $totalBefore,
    		'total_after' => $this->amount,
    		'date' => date('Ymd')
    	]);
    	

    	if($depos && $histor)
    		return['sucess' => true,
    			   'message' => ' Sucesso ao recarregar'];
    	return		   
    		['sucess' => false,
    			   'message' => 'Não houve sucesso ao recarregar'];

    }

}
