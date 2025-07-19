<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Pastikan ini di-import

class PeopleController extends Controller
{
    /**
     * Constructor untuk menerapkan middleware 'auth'.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan halaman 'People'.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request) // Inject Request
    {
        // Mengambil semua user dari database, bukan data dummy
        $query = User::orderBy('name'); // Mulai dengan query dasar

        // Terapkan filter berdasarkan parameter request
        // Filter by type (All/Organization)
        if ($request->has('type') && $request->type == 'organization') {
            // Contoh: Filter user yang memiliki divisi (bukan personal)
            $query->whereNotNull('division')->where('division', '!=', '');
        }

        if ($request->has('position') && $request->position != '') {
            $query->where('role', $request->position); // 'role' adalah kolom database untuk 'position'
        }

        if ($request->has('division') && $request->division != '') {
            $query->where('division', $request->division);
        }

        // Tambahkan fungsionalitas pencarian
        if ($request->has('search') && $request->search != '') {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                  ->orWhere('email', 'like', $searchTerm)
                  ->orWhere('division', 'like', $searchTerm)
                  ->orWhere('role', 'like', $searchTerm); // Cari juga di kolom role (position)
            });
        }

        $people = $query->get();

        // Untuk setiap orang, tambahkan status online (dummy) dan progress (dummy)
        // KITA TIDAK LAGI MENGGANTI avatar_url DENGAN PLACEHOLDER DI SINI.
        // avatar_url akan diambil langsung dari database jika ada.
        $people = $people->map(function ($person) {
            $person->online = (bool)rand(0, 1); // Status online/offline acak
            $person->progress = rand(30, 100); // Progress acak
            return $person;
        });

        // Kirim nilai filter saat ini kembali ke view
        return view('people', compact('people'))
            ->with('currentType', $request->type ?? 'all') // Default 'all'
            ->with('currentPosition', $request->position)
            ->with('currentDivision', $request->division)
            ->with('currentSearch', $request->search);
    }

    /**
     * Menyimpan user baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            // Validasi untuk 'position' yang akan disimpan ke kolom 'role'
            'position' => ['required', 'string', 'in:Staff,Manager HR,Manager Finance,Manager Technical,Manager Legal'],
            // Validasi untuk 'division'
            'division' => ['nullable', 'string', 'in:Human Resource,Legal,Technical,Finance'],
        ]);

        // Buat user baru di database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Gunakan Hash::make() untuk meng-hash password
            'role' => $request->position, // <<< Disimpan ke kolom 'role' di database
            'division' => $request->division,
            // Kolom avatar_url akan kosong secara default saat membuat user baru di sini.
            // Ini akan diisi saat user mengunggah foto profil mereka sendiri.
        ]);

        // Redirect kembali ke halaman people dengan pesan sukses
        return redirect()->route('people.index')->with('success', 'User added successfully!');
    }
}
