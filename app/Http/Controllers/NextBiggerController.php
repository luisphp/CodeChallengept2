<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NextBiggerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()


    {
            
            return view('nbform.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('nbform.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cadena = $request->input('numero');

        $matriz = str_split($cadena);

        $matriz_resultado = array();

        if(count($matriz) == 1){

            $resultado = -1;


        }else{

            rsort($matriz);

            $arrlength = count($matriz);

                for($x = 0; $x < $arrlength; $x++) {

                    array_push($matriz_resultado, $matriz[$x]);


                    
                }

                if(implode($matriz_resultado) === $cadena){

                    $resultado = -1;

                }else{

                    $resultado = implode($matriz_resultado);
                }

                
        }


        return view('nbform.resultado', [
                        'resultado' => $resultado,
                        
                    ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
