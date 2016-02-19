<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Eduweb2\Libcore\LockerGewenst;

class LockerGewenstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = LockerGewenst::with('leerling','leerling.user','leerling.klas','leerling.lockers')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('leerling.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('id'))   {

            return $this->update($request,$request->input('id'));
        }
        else {
            $object = new LockerGewenst();
            $object->leerling_id       = $request->input('leerling_id');
            $object->save();

            // redirect
            return response()->json(array('success' => true));
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
        $object = LockerGewenst::find($id);

        // show the view and pass the nerd to it
        return response()->json($object);
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
        $object = LockerGewenst::find($id);
        $object->leerling_id = $request->input('leerling_id');;
        $object->save();
        return response()->json(array('success' => true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LockerGewenst::destroy($id);

        return response()->json(array('success' => true));
    }

    public function indexCustom()
    {
        $data = \DB::table('locker_gewenst')
            ->leftJoin('leerling', 'locker_gewenst.leerling_id', '=', 'leerling.id')
            ->leftJoin('user', 'leerling.user_id', '=', 'user.id')
            ->leftJoin('klas', 'leerling.klas_id', '=', 'klas.id')
            ->select('locker_gewenst.id','locker_gewenst.leerling_id','user.achternaam','user.voornaam','klas.code as klas')
            ->orderBy('user.achternaam')
            ->get();
        return response()->json($data);
    }
}
