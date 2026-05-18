<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaans = Perusahaan::latest()->get();

        return view('admin.perusahaan.index', compact('perusahaans'));
    }

    public function create()
    {
        return view('admin.perusahaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'bidang' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah_karyawan' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $this->buildData($request);

        $perusahaan = new Perusahaan();
        $perusahaan->forceFill($data);
        $perusahaan->save();

        return redirect()
            ->route('admin.perusahaan.index')
            ->with('success', 'Perusahaan berhasil ditambahkan.');
    }

    public function edit(Perusahaan $perusahaan)
    {
        return view('admin.perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'bidang' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah_karyawan' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $this->buildData($request);

        $perusahaan->forceFill($data);
        $perusahaan->save();

        return redirect()
            ->route('admin.perusahaan.index')
            ->with('success', 'Perusahaan berhasil diperbarui.');
    }

    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();

        return redirect()
            ->route('admin.perusahaan.index')
            ->with('success', 'Perusahaan berhasil dihapus.');
    }

    private function buildData(Request $request): array
    {
        $data = [];

        /*
        |--------------------------------------------------------------------------
        | Nama perusahaan
        |--------------------------------------------------------------------------
        */

        if (Schema::hasColumn('perusahaans', 'nama_perusahaan')) {
            $data['nama_perusahaan'] = $request->nama_perusahaan;
        }

        if (Schema::hasColumn('perusahaans', 'nama')) {
            $data['nama'] = $request->nama_perusahaan;
        }

        if (Schema::hasColumn('perusahaans', 'name')) {
            $data['name'] = $request->nama_perusahaan;
        }

        /*
        |--------------------------------------------------------------------------
        | Bidang / Industri
        |--------------------------------------------------------------------------
        */

        if (Schema::hasColumn('perusahaans', 'bidang')) {
            $data['bidang'] = $request->bidang;
        }

        if (Schema::hasColumn('perusahaans', 'industri')) {
            $data['industri'] = $request->bidang;
        }

        if (Schema::hasColumn('perusahaans', 'industry')) {
            $data['industry'] = $request->bidang;
        }

        /*
        |--------------------------------------------------------------------------
        | Alamat / Lokasi
        |--------------------------------------------------------------------------
        */

        if (Schema::hasColumn('perusahaans', 'alamat')) {
            $data['alamat'] = $request->alamat;
        }

        if (Schema::hasColumn('perusahaans', 'lokasi')) {
            $data['lokasi'] = $request->alamat;
        }

        /*
        |--------------------------------------------------------------------------
        | Email, Website, Deskripsi, Jumlah Karyawan
        |--------------------------------------------------------------------------
        */

        if (Schema::hasColumn('perusahaans', 'email')) {
            $data['email'] = $request->email;
        }

        if (Schema::hasColumn('perusahaans', 'website')) {
            $data['website'] = $request->website;
        }

        if (Schema::hasColumn('perusahaans', 'situs')) {
            $data['situs'] = $request->website;
        }

        if (Schema::hasColumn('perusahaans', 'deskripsi')) {
            $data['deskripsi'] = $request->deskripsi;
        }

        if (Schema::hasColumn('perusahaans', 'description')) {
            $data['description'] = $request->deskripsi;
        }

        if (Schema::hasColumn('perusahaans', 'jumlah_karyawan')) {
            $data['jumlah_karyawan'] = $request->jumlah_karyawan;
        }

        /*
        |--------------------------------------------------------------------------
        | Upload Logo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('foto_perusahaan', 'public');

            if (Schema::hasColumn('perusahaans', 'logo')) {
                $data['logo'] = $path;
            }

            if (Schema::hasColumn('perusahaans', 'foto')) {
                $data['foto'] = $path;
            }

            if (Schema::hasColumn('perusahaans', 'foto_perusahaan')) {
                $data['foto_perusahaan'] = $path;
            }
        }

        return $data;
    }
}