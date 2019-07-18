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

        //obtengo el numero del request.
        $cadena = $request->input('numero');

        //convierto el numero en un array
        $matriz = str_split($cadena);

        //declaro un array rsultado el cual va a contener el array original pero ordenado de mayor a menor
        $matriz_resultado = array();


        //si el numero suministrado es menor a 10 ó Si el array no tiene mas de 1 elemento se muestra -1
        if(count($matriz) < 1){

            $resultado = -1;


        }else{

        //si el numero es mayor a 10 ó si el array tiene mas de un elemento se determina cual es su mayor más proximo

            /*primero se ordena de mayor a menor el numero suministrado para determinado cual el es el mayor más lejano
              el cual se va a almacenar en el array matriz_resultado
            */
            rsort($matriz);

            $arrlength = count($matriz);

                for($x = 0; $x < $arrlength; $x++) {

                    array_push($matriz_resultado, $matriz[$x]);
                    
                }
               }


               /*si se suministro un número de mas de 1 digito se determina si los 3 digitos son iguales y se retorna -1 en caso de que asi sea */

               if(implode($matriz_resultado) == $cadena ){

                $resultado = -1;

               }else{
                   /*
                    En caso de que se haya pasado las otras restricciones, determinamos cual es el valor mayor mas cercano 

                    Ejemplos:

                            nextBigger(12)==21
                            nextBigger(513)==531
                            nextBigger(2017)==2071
                            nextBigger(9)==-1
                            nextBigger(111)==-1
                            nextBigger(531)==-1
                            nextBigger(1234)==1243
                   */

                   $resultado = $this->nextBigger($cadena, $matriz_resultado);

                  

                        }

                        //Muestro el resultado al usuario

            return view('nbform.resultado', [
                        'resultado' => $resultado,
                        
                    ]);

    }

    

    public function nextBigger($cadena, $matriz_resultado){

        /*
            Funcion para determinar el valor mayor mas cercano.
        */

         $limite = implode($matriz_resultado);

                   $iteracion = $cadena;

                   do {

                       $iteracion = $iteracion + 1;

                   } while ( $this->flag($iteracion, $cadena) == 0 && $iteracion < $limite);
                        

                        
                        /*El resultado va a ser igual al array que contenga todos los elementos 
                        que estan en el array original o numero original pero el cual se incremento para determinar 
                        cual es el valor mayor mas proximo
                        */

                        return $iteracion;
    }

    public function flag($iteracion, $cadena){

        /*flag indicador para saber cuando un array resultante de la suma del numero suministrado +1 es el numero mayor mas cercano que contenga los mismos valores del numero otorgado originalmente */

        //Verifico si los array tienen los mismo numeros respecto al array iteracion
        $cuenta_1 = count(array_diff(str_split($iteracion), str_split($cadena)));

        //Verifico si los array tienen los mismo numeros respecto al array cadena
        $cuenta_2 = count(array_diff(str_split($cadena), str_split($iteracion)));

                                if( $cuenta_1 + $cuenta_2 == 0 ){

                                        //En caso de que ambos tegan los mismos valores
                                        return 1;

                                }else{
                                        return 0;
                                }

       

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
