<?php

namespace App\Http\Controllers;
use Iluminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Models\Articulo;

class ArticuloController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $articles = Articulo::orderBy('id','desc')->paginate(5);

        return view('articulo.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
     
        // $validate = $this->validate($request, [
        //     'code' => ['required', 'string', 'max:255'],
        //     'description' => ['required', 'string', 'max:255'],
        //     'ampunt' => ['required'],
        //     'price' => ['required']
        // ]);

         $new_code = $request->input('code');
         $isset_article = Articulo::where('code', $new_code)
                                    ->count();

        if($isset_article==0){

            $articulos = new Articulo();
            $articulos->code = $new_code;
            $articulos->description = $request->input('description');
            $articulos->amount = $request->input('amount');
            $articulos->price = $request->input('price');

            $articulos->save();

            return redirect('/articulos')->with([
                'message' => 'Articulo guardado correctamente'
            ]);


        }else{

            return redirect('articulos/create')->with([
                'message' => 'El codigo ya existe, por favor ingrese otro articulo'
        ]);

        }
        
  

        // var_dump($artculos->code);
        // var_dump($artculos->description);
        // die();
        
      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Articulo::find($id);
        return view('articulo.edit')->with('article', $article);
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
        //No necesita crear un articulo nuevo solo encontrar el que está llegando 
        $articulo = Articulo::find($id);

        //Asigno los valores del formulario a esa es objeto
        $articulo->code = $request->input('code');
        $articulo->description = $request->input('description');
        $articulo->amount = $request->input('amount');
        $articulo->price = $request->input('price');

        //Lo guardamos
        $articulo->update();

        //Redireccionamos
        return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();

        return redirect('/articulos');
    }
}
