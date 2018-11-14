<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Babak;
use App\Soal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $babak = Babak::all();
        $soal = Soal::where('babak_id', 1)->get();
        $lemparan = Soal::where('babak_id', 2)->get();

        return view('home', compact('babak', 'soal', 'lemparan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'babak_id' => 'required|integer',
            'isi_soal' => 'required|string',
        ],[
            'babak_id.required' => 'Kolom jenis soal harus diisi',
            'isi_soal.required' => 'Kolom soal harus diisi',
            'babak_id.integer' => 'Pilih salah satu jenis soal yang disediakan',
        ]);

        $soal = new Soal();
        $soal->babak_id = $request->babak_id;
        $soal->isi_soal = $request->isi_soal;
        $soal->save();

        return redirect()->back()->with('success', 'berhasil menyimpan data');
    }

    public function show($id)
    {
        $soal = Soal::find($id);

        // return $soal;
        echo $soal->toJson();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'babak_id' => 'required|integer',
            'isi_soal' => 'required|string',
        ],[
            'babak_id.required' => 'Kolom jenis soal harus diisi',
            'isi_soal.required' => 'Kolom soal harus diisi',
            'babak_id.integer' => 'Pilih salah satu jenis soal yang disediakan',
        ]);

        $soal = Soal::find($id);
        $soal->babak_id = $request->babak_id;
        $soal->isi_soal = $request->isi_soal;
        $soal->save();

        return redirect()->back()->with('success', 'berhasil mengubah soal');
    }

    public function destory($id)
    {
        Soal::destroy($id);
        return redirect()->back()->with('success', 'berhasil menghapus data');
    }
}
