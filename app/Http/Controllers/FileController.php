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
        
        $file = $request->file('file');
        $tgl_dokumen = Carbon::parse($request->tgl_dokumen);
        $request['tgl_dokumen'] = $tgl_dokumen->format('d-m-Y');

        // $tgl_dokumen = date('Y-m-d H:i');
        $url       = "";
        if ($file != null) {
            if(Auth::user()->bagian_id == 1){ //id 1 -> admin
                $destinationPath = 'dokumen/';
            }elseif(Auth::user()->bagian_id == 2){ //id 2 -> umper/
                $destinationPath = 'dokumen/umper';
            }elseif (Auth::user()->bagian_id == 3) { //id 3 -> yanmed/
                $destinationPath = 'dokumen/yanmed';
            }elseif (Auth::user()->bagian_id == 4) { //id 4 -> jangmed/
                $destinationPath = 'dokumen/jangmed';
            }elseif (Auth::user()->bagian_id == 5) { //id 5 -> keuangan/
                $destinationPath = 'dokumen/keuangan';
            }elseif (Auth::user()->bagian_id == 6) { //id 6 -> pengembangan/
                $destinationPath = 'dokumen/pengembangan';
            }elseif (Auth::user()->bagian_id == 7) { //id 7 -> sdm&kepeg/
                $destinationPath = 'dokumen/sdm';
            }elseif (Auth::user()->bagian_id == 8) { //id 8 ->komite keperawatan/
                $destinationPath = 'dokumen/kom-keperawatan';
            }elseif (Auth::user()->bagian_id == 9) { //id 9 -> komite medik/
                $destinationPath = 'dokumen/kom-medik';
            }elseif (Auth::user()->bagian_id == 10) { //id 10 -> komite mutu/
                $destinationPath = 'dokumen/kom-mutu';
            }elseif (Auth::user()->bagian_id == 11) { //id 11 -> komite nakes lain/
                $destinationPath = 'dokumen/kom-nakes-lain';
            }elseif (Auth::user()->bagian_id == 12) { //id 12 -> komite rekam medik/
                $destinationPath = 'dokumen/kom-rekam-medik';
            }
            else{
                $destinationPath    = 'dokumen/other';
            }
            $name   = $file->getClientOriginalName();
            $move   = $file->move($destinationPath, $name);
            $url    = "{$name}";

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

        $files = File::where('user_id', Auth::id())
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
                if(Auth::user()->id == 1){ //id 1 -> admin
                    $destinationPath = 'dokumen/';
                }elseif(Auth::user()->id == 2){ //id 2 -> umper/
                    $destinationPath = 'dokumen/umper';
                }elseif (Auth::user()->id == 3) { //id 3 -> yanmed/
                    $destinationPath = 'dokumen/yanmed';
                }elseif (Auth::user()->id == 4) { //id 4 -> jangmed/
                    $destinationPath = 'dokumen/jangmed';
                }elseif (Auth::user()->id == 5) { //id 5 -> keuangan/
                    $destinationPath = 'dokumen/keuangan';
                }elseif (Auth::user()->id == 6) { //id 6 -> pengembangan/
                    $destinationPath = 'dokumen/pengembangan';
                }elseif (Auth::user()->id == 7) { //id 7 -> sdm&kepeg/
                    $destinationPath = 'dokumen/sdm';
                }elseif (Auth::user()->id == 8) { //id 8 ->komite keperawatan/
                    $destinationPath = 'dokumen/kom-keperawatan';  
                }elseif (Auth::user()->id == 9) { //id 9 -> komite medik/
                    $destinationPath = 'dokumen/kom-medik';
                }elseif (Auth::user()->id == 10) { //id 10 -> komite mutu/
                    $destinationPath = 'dokumen/kom-mutu';
                }elseif (Auth::user()->id == 11) { //id 11 -> komite nakes lain/
                    $destinationPath = 'dokumen/kom-nakes-lain';
                }elseif (Auth::user()->id == 12) { //id 12 -> komite rekam medik/
                    $destinationPath = 'dokumen/kom-rekam-medik';
                }
                else{
                    $destinationPath    = 'dokumen/other';
                }
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
