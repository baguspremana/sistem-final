<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Babak;
use App\Soal;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $babak = Babak::all();

        return view('index', compact('babak'));
    }

    public function showSoal(Babak $babak)
    {
        $babaks = Babak::all();

        $soal = $babak->soal()
                    ->orderBy('id', 'asc')
                    ->get();

        // return $babaks;
        return view('soal', compact('babaks', 'soal', 'babak'));
    }

    public function soal(Request $request)
    {
        $babak_id = $request->babak_id;

        $babak_name = Babak::find($babak_id);

        $data = Soal::with('babak')
            ->where('babak_id', $babak_id)
            ->get();

        return view('soalPage', compact('babak_id', 'babak_name', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Soal::find($request->id);
        $data->view = $request->view;
        $data->save();

        return response ()->json ($data);
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
        $soal = Soal::find($id);
        $soal->view = $request->view;
        $soal->save();
        return response()->json($soal);
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
