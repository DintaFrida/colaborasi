<?php


namespace App\Http\Controllers;

use App\Models\Faskes;
use App\Models\jenisFaskes; // <-- Tambahkan ini
use Illuminate\Http\Request;

class FaskesPublicController extends Controller
{
    /**
     * Menampilkan halaman utama (landing page).
     */
    public function index()
    {
        // Ambil semua data jenis faskes dari database
        $allJenisFaskes = JenisFaskes::all();

        // Kirim data tersebut ke view 'faskes.index'
        return view('faskes.index', ['allJenisFaskes' => $allJenisFaskes]);
    }

    /**
     * Menampilkan detail satu faskes.
     */
    public function show(Faskes $faske)
    {
        return view('faskes.show', compact('faske'));
    }

    public function showByType(jenisFaskes $jenisFaskes)
    {
        $listFaskes = Faskes::where('jenis_faskes_id', $jenisFaskes->id)
                            ->latest()
                            ->paginate(12);

        return view('faskes.list-by-type', [
            'listFaskes' => $listFaskes,
            'jenisFaskes' => $jenisFaskes
        ]);
    }
}
