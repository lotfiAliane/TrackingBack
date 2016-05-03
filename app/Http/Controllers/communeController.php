<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class communeController extends Controller
{
    //

    /**
     * Get country's cities.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function communes($id)
    {
        // Retour des villes pour le pays sélectionné 
        return commune::wherewilayawilayaID($id)->get();
    }   
}
