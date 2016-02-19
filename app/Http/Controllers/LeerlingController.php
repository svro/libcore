<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Eduweb2\Libcore\Leerling;
use Eduweb2\Libcore\User;
use Eduweb2\Libcore\Klas;


class LeerlingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Leerling::with('user')->get();
        $data = Leerling::all();
        /*$data = \DB::table('leerling')
            ->leftJoin('user', 'leerling.user_id', '=', 'user.id')
            ->select('*')
            ->get();
        //$data = \DB::table('user')->select('achternaam', 'voornaam')->get();*/
        //dd($data);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leerling.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $object = new Leerling();
        $object->klasnummer       = $request->input('klasnummer');
        $object->user_id   = $request->input('user_id');
        $object->klas_id   = $request->input('klas_id');
        $object->save();

        // redirect
        return response()->json(array('success' => true));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $object = Leerling::find($id);

        // show the view and pass the nerd to it
        return view('leerlingen.show')
            ->with('leerling', $object);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Leerling::destroy($id);

        return response()->json(array('success' => true));
    }

    public function indexCustom()
    {
        //$data = Leerling::with('user')->get();
        //$data = Leerling::all();
        $data = \DB::table('leerling')
            ->leftJoin('user', 'leerling.user_id', '=', 'user.id')
            ->select('leerling.id','achternaam','voornaam')
            ->orderBy('user.achternaam')
            ->get();
        //$data = \DB::table('user')->select('achternaam', 'voornaam')->get();*/
        //dd($data);
        return response()->json($data);
    }
}
