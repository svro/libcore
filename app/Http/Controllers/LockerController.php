<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Eduweb2\Libcore\Locker;

class LockerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Locker::with('lockertype')->get();
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
            $object = new Locker();
            $object->code       = $request->input('code');
            $object->locker_type_id       = $request->input('locker_type_id');
            $object->save();
            // redirect
            return response()->json(array('success'=> true,'locker' => $object));
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
        $object = Locker::find($id);

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
        $object = Locker::find($id);
        $object->naam       = $request->input('code');
        $object->locker_type_id       = $request->input('locker_type_id');
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
        Locker::destroy($id);

        return response()->json(array('success' => true));
    }

    public function indexCustom()
    {
        $data = \DB::table('locker')
            ->leftJoin('locker_type', 'locker.locker_type_id', '=', 'locker_type.id')
            ->leftJoin('leerling', 'locker.leerling_id', '=', 'leerling.id')
            ->leftJoin('user', 'leerling.user_id', '=', 'user.id')
            ->leftJoin('klas', 'leerling.klas_id', '=', 'klas.id')
            ->select('locker.id','locker.code as lockercode','locker_type.naam','user.achternaam','user.voornaam','klas.code as klascode')
            ->orderBy('locker_type.naam')
            ->orderBy('locker.code')
            ->get();
        return response()->json($data);
    }

    public function storeBatch(Request $request) {
        //dd("storeBatch");
        $startcode = $request->input('startcode');
        $startnummer =  $request->input('startnummer');
        $stopnummer =  $request->input('stopnummer');
        for ($i=$startnummer;$i<=$stopnummer;++$i) {
            $object = new Locker();
            $object->code = $startcode . sprintf('%03d',$i);
            $object->locker_type_id       =  $request->input('locker_type_id');
            $object->save();
        }
        // redirect
        return response()->json(array('success' => true));
    }
}
