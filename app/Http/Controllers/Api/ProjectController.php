<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;


// chiamata api per vue

class ProjectController extends Controller
{
    public function index()
    {
        // $projects = Project::all();

        $projects = Project::with( 'type', 'technologies' )->get();

        return response()->json([
            'succes' => true,
            'projects' => $projects
        ]);
    }

    public function show($slug){
        
        $aux = Project::with( 'type', 'technologies' )->where('slug', $slug )->first();
        

        if( $aux ){
            return response()->json([
                'succes' => true,
                'post' => $aux
            ]);
        } else {
            return response()->json([
                'succes' => false,
                'error' => 'non ci sono posts'
            ]);
        }
    }
}
