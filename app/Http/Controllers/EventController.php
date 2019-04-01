<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //elimina una imagen de la carpera uploads

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $datos['eventos']=Event::paginate(5);
        return view('eventos.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosEvento=request()->all();

        $datosEvento=request()->except('_token');

        if($request->hasFile('logo')){
            $datosEvento['logo']=$request->file('logo')->store('uploads','public');
        }

        Event::insert($datosEvento);
        
        //return response()->json($datosEvento);
        return redirect('eventos')->with('Mensaje','Evento Creado exitosamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Event::findOrFail($id);
        return view('eventos.update',compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEvento=request()->except(['_token','_method']);
        
        if($request->hasFile('logo')){
            $evento = Event::findOrFail($id);
            
            Storage::delete('public/'.$evento->logo);//elimina la foto anterior

            $datosEvento['logo']=$request->file('logo')->store('uploads','public');
        }

        Event::where('id','=',$id)->update($datosEvento);
        return redirect('eventos')->with('Mensaje','Evento Modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Event::findOrFail($id);

        if(Storage::delete('public/'.$evento->logo))
        {
            Event::destroy($id);
        };
        
        return redirect('eventos')->with('Mensaje','Evento Eliminado exitosamente');
    }
}
