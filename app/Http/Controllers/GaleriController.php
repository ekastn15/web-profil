<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Faq;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller{

    public function index()
    {
        $galeri = Galeri::with('agenda')->orderBy('created_at', 'ASC')->get();
        return view('galeri.index', compact('galeri'));
    }

    public function add()
    {
        $agenda = Agenda::all(); 
        return view('galeri.insert', compact('agenda'));

    }

    public function insert(Request $request)
    {
        $request->validate([
            'foto_galeri.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'id_agenda' => 'required', 
        ]);

        $galeri =[
            'id_agenda'=>$request->id_agenda,
        ];

        if ($request->hasFile('foto_galeri')) {
            $foto_files = $request->file('foto_galeri'); // Mengambil semua file yang diunggah
            $foto_nama_list = []; // Array untuk menyimpan nama file gambar
        
            foreach (array_slice($foto_files, 0, 3) as $foto_file) { // Batasi maksimal 3 gambar
                $foto_nama = $foto_file->hashName(); // Generate nama unik untuk file
                $foto_file->move(public_path('images'), $foto_nama); // Pindahkan ke folder public/images
                $foto_nama_list[] = $foto_nama; // Simpan nama file ke array
            }
        
            // Gabungkan nama file menjadi string (dipisahkan koma) untuk disimpan di database
            $galeri['foto_galeri'] = implode(',', $foto_nama_list);
        }

        Galeri::create($galeri);
        return redirect()->route('galeri')->with('message', 'Data Berhasil Ditambahkan');
    }


    // Method untuk menampilkan form edit
    public function edit($id_galeri)
    {
        $galeri = Galeri::findOrFail($id_galeri);
        $agenda = Agenda::all();
        return view('galeri.edit', compact('galeri', 'agenda'));
    }

    // Method untuk memperbarui data galeri
    public function update(Request $request, $id_galeri) 
    {
        $request->validate
        ([
            'foto_galeri.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('foto_galeri')){
            $foto_files = $request->file('foto_galeri'); // Mengambil semua file yang diunggah
            $foto_nama_list = []; 

            foreach (array_slice($foto_files, 0, 3) as $foto_file) { // Batasi maksimal 3 gambar
                $foto_nama = $foto_file->hashName(); // Generate nama unik untuk file
                $foto_file->move(public_path('images'), $foto_nama); // Pindahkan ke folder public/images
                $foto_nama_list[] = $foto_nama; // Simpan nama file ke array
            }

            $galeri = Galeri::where('id_galeri', $id_galeri)->first();

            if (!empty($galeri->foto_galeri)) {
                $foto_lama_list = explode(',', $galeri->foto_galeri); // Pisahkan string ke array
                foreach ($foto_lama_list as $foto_lama) {
                    File::delete(public_path('images') . '/' . trim($foto_lama)); // Hapus file satu per satu
                }
            }
    
            // Gabungkan nama file baru ke string untuk disimpan di database
            $dataEdit['foto_galeri'] = implode(',', $foto_nama_list);

        }

        Galeri::where('id_galeri', $id_galeri)->update($dataEdit);
        return redirect()->route('galeri')->with('message', 'Data Behasil Diubah');
    }

    public function resetImage(string $id_galeri)
    {
        // Cari galeri berdasarkan id
        $galeri = Galeri::where('id_galeri', $id_galeri)->first();

        // Validasi apakah data ditemukan
        if (!$galeri) {
            return redirect()->route('galeri')->with('error', 'Galeri tidak ditemukan.');
        }

        // Hapus file gambar dari folder public/images jika ada
        if (!empty($galeri->foto_galeri)) {
            $fotoList = explode(',', $galeri->foto_galeri); // Pisahkan jika ada lebih dari satu gambar
            foreach ($fotoList as $foto) {
                File::delete(public_path('images') . '/' . trim($foto));
            }
        }

        // Reset field foto_galeri menjadi null
        $galeri->foto_galeri = '';
        $galeri->save();

        return redirect()->route('galeri.edit',  ['id_galeri' => $id_galeri])->with('message', 'Image reset sukses.');
    }

}