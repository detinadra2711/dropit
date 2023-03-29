<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as StorageFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function index(): View
    {
        $files = File::where('user_id', Auth::id())
            ->where('is_active', 1)
            ->get();

        return view('file.index', compact('files'));
    }

    public function create(): View
    {
        return view('file.upload');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'nomor_dokumen' => 'required|string|max:20',
            'tgl_dokumen' => 'required|string',
            'catatan' => 'nullable|string|max:100',
            'file' => 'required|file|mimes:pdf',
        ]);

        if (Auth::user()->bagian_id == 1) { //id 1 -> admin
            $destinationPath = 'dokumen/';
        } elseif (Auth::user()->bagian_id == 2) { //id 2 -> umper/
            $destinationPath = 'dokumen/umper';
        } elseif (Auth::user()->bagian_id == 3) { //id 3 -> yanmed/
            $destinationPath = 'dokumen/yanmed';
        } elseif (Auth::user()->bagian_id == 4) { //id 4 -> jangmed/
            $destinationPath = 'dokumen/jangmed';
        } elseif (Auth::user()->bagian_id == 5) { //id 5 -> keuangan/
            $destinationPath = 'dokumen/keuangan';
        } elseif (Auth::user()->bagian_id == 6) { //id 6 -> pengembangan/
            $destinationPath = 'dokumen/pengembangan';
        } elseif (Auth::user()->bagian_id == 7) { //id 7 -> sdm&kepeg/
            $destinationPath = 'dokumen/sdm';
        } elseif (Auth::user()->bagian_id == 8) { //id 8 ->komite keperawatan/
            $destinationPath = 'dokumen/kom-keperawatan';
        } elseif (Auth::user()->bagian_id == 9) { //id 9 -> komite medik/
            $destinationPath = 'dokumen/kom-medik';
        } elseif (Auth::user()->bagian_id == 10) { //id 10 -> komite mutu/
            $destinationPath = 'dokumen/kom-mutu';
        } elseif (Auth::user()->bagian_id == 11) { //id 11 -> komite nakes lain/
            $destinationPath = 'dokumen/kom-nakes-lain';
        } elseif (Auth::user()->bagian_id == 12) { //id 12 -> komite rekam medik/
            $destinationPath = 'dokumen/kom-rekam-medik';
        } else {
            $destinationPath = 'dokumen/other';
        }

        $file = $request->file('file');
        $name = Str::slug($request->nama_file).'.'.$file->getClientOriginalExtension();
        $file->storeAs($destinationPath, $name, 'local');
        $url = $destinationPath.'/'.$name;

        File::create([
            'user_id' => Auth::user()->id,
            'kategori_id' => $request->kategori_id,
            'name' => $request->nama_file,
            'nomor_dokumen' => $request->nomor_dokumen,
            'tgl_dokumen' => $request->tgl_dokumen,
            'catatan' => $request->catatan,
            'url' => $url,
            'is_active' => 1, //datanya masih ada, kalau sudah di delete akan berubah jadi 0
        ]);

        return redirect()->route('file.index');
    }

    public function edit($id): View
    {
        $file = File::where('user_id', Auth::user()->id)
            ->where('is_active', 1)
            ->where('id', $id)
            ->first();

        if (! $file) {
            return abort(404);
        }

        return view('file.edit', compact('file'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'nomor_dokumen' => 'required|string|max:20',
            'tgl_dokumen' => 'required|string',
            'catatan' => 'nullable|string|max:100',
            'file' => 'nullable|file|mimes:pdf',
        ]);

        $document = File::where('id', $id)
            ->where('is_active', 1)
            ->get()
            ->first();

        if (Auth::user()->id == 1) { //id 1 -> admin
            $destinationPath = 'dokumen/';
        } elseif (Auth::user()->id == 2) { //id 2 -> umper/
            $destinationPath = 'dokumen/umper';
        } elseif (Auth::user()->id == 3) { //id 3 -> yanmed/
            $destinationPath = 'dokumen/yanmed';
        } elseif (Auth::user()->id == 4) { //id 4 -> jangmed/
            $destinationPath = 'dokumen/jangmed';
        } elseif (Auth::user()->id == 5) { //id 5 -> keuangan/
            $destinationPath = 'dokumen/keuangan';
        } elseif (Auth::user()->id == 6) { //id 6 -> pengembangan/
            $destinationPath = 'dokumen/pengembangan';
        } elseif (Auth::user()->id == 7) { //id 7 -> sdm&kepeg/
            $destinationPath = 'dokumen/sdm';
        } elseif (Auth::user()->id == 8) { //id 8 ->komite keperawatan/
            $destinationPath = 'dokumen/kom-keperawatan';
        } elseif (Auth::user()->id == 9) { //id 9 -> komite medik/
            $destinationPath = 'dokumen/kom-medik';
        } elseif (Auth::user()->id == 10) { //id 10 -> komite mutu/
            $destinationPath = 'dokumen/kom-mutu';
        } elseif (Auth::user()->id == 11) { //id 11 -> komite nakes lain/
            $destinationPath = 'dokumen/kom-nakes-lain';
        } elseif (Auth::user()->id == 12) { //id 12 -> komite rekam medik/
            $destinationPath = 'dokumen/kom-rekam-medik';
        } else {
            $destinationPath = 'dokumen/other';
        }

        if ($request->hasFile('file')) {
            $new_file = $request->file('file');
            $new_name = Str::slug($request->nama_file).'.'.$new_file->getClientOriginalExtension();
            $new_url = $destinationPath.'/'.$new_name;

            $old_file = StorageFile::isFile($document->url);
            ! $old_file ?: unlink($document->url);

            $new_file->storeAs($destinationPath, $new_name, 'local');
        } else {
            $url = $destinationPath.'/'.Str::slug($request->nama_file).'.pdf';
            if (file_exists($document->url)) {
                StorageFile::isFile($url) ?: Storage::move($document->url, $url);
            }
        }

        $document->update([
            'url' => $request->hasFile('file') ? $new_url : $url,
            'name' => $request->nama_file,
            'nomor_dokumen' => $request->nomor_dokumen,
            'tgl_dokumen' => $request->tgl_dokumen,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('file.index');
    }

    public function destroy($id): RedirectResponse
    {
        $document = File::where('id', $id)
            ->get()
            ->first();

        if ($document) {
            if (file_exists($document->url)) {
                unlink($document->url);
            }

            $document->delete();
        }

        return redirect()->route('file.index');
    }
}
