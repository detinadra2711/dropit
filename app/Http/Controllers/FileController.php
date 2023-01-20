<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FileController extends Controller
{
    //

    public function create(Request $request)
    {

        $file     = $request->file('file');
        $tgl_dokumen = Carbon::parse($request->tgl_dokumen);
        $request['tgl_dokumen'] = $tgl_dokumen->format('Y-m-d');

        // $tgl_dokumen = date('Y-m-d H:i');
        $url       = "";
        if ($file != null) {
            $destinationPath    = 'file/';
            $name               = $file->getClientOriginalName();
            $move              =   $file->move($destinationPath, $name);
            $url                = "{$name}";

            File::create([
                "user_id"       => Auth::user()->id,
                "name"          => $request->nama_file,
                "nomor_dokumen" => $request->nomor_dokumen,
                "tgl_dokumen"   => $request->tgl_dokumen,
                "url"       => $url,
                'is_active'          => 1 //datanya masih ada, kalau sudah di delete akan berubah jadi 0
            ]);

            return redirect()->route('list-file');
        }
    }

    public function get_list_file()
    {

        $files = File::where('user_id', Auth::user()->id)
            ->where('is_active', 1)
            ->get();

        return view('file.list-file', ["files" => $files]);
    }

    public function get_file($id_file)
    {

        $file = File::where('user_id', Auth::user()->id)
            ->where('is_active', 1)
            ->where('id', $id_file)
            ->first();
        if ($file == NULL) {
            return abort(404);
        }
        return view('file.detail-file', ["file" => $file]);
    }
    public function update(Request $request)
    {

        if ($request->submit == "update") {

            $file     = $request->file('file');
            $url      = "";
            if ($file != null) {
                $destinationPath    = 'file/';
                $name               = $file->getClientOriginalName();
                $move              =   $file->move($destinationPath, $name);
                $url                = "{$name}";
            }

            File::where('is_active', 1)
                ->where('id', $request->id)
                ->update(['url' => $url, 'name' => $request->nama_file]);

            return redirect()->route('detail-file', ['id' => $request->id]);
        } else {
            File::where('is_active', 1)
                ->where('id', $request->id)
                ->update(['is_active' => 0]);

            return redirect()->route('list-file');
        }
    }

    public function show($id){
        $file = File::find($id);
        return view('file.show', ['file' => $file]);

        return view('file.show');
    }
}
