<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;



// chiamata api per vue

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // $projects = Project::all();


        // if( $request->has( 'type_id' ) ){
        //      $projects = Project::with( 'type', 'technologies' )->where( 'type_id', $request->type_id )->get();
        //     } else {
        //     $projects = Project::with( 'type', 'technologies' )->get();
        // }

        // return response()->json([
        //     'success' => true,
        //     'projects' => $projects
        // ]);


         $query = Project::with(['type', 'technologies']);

            if($request->has('type_id')){
             $query->where('type_id', $request->type_id);
         }

         if( $request->has( 'technologies_id')){
             $technologyId = explode( ',', $request->technologies_id);
             $query->whereHas('technologies', function($query) use ($technologyId){
                 $query->whereIn('id', $technologyId);
             });
         }


            $projects = $query->get();


            return response()->json([
              'success' => true,
              'projects' => $projects
          ]);
       
    }


    // funzione che richiama lo show per la stampa in vue

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
