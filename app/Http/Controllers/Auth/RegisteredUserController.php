<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Gedung;
use App\Models\Lantai;
use App\Models\Role;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $gedung = Gedung::all();
        return view('auth.register', compact('gedung'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'ruangan_id' => ['required', 'exists:ruangan,id']
        ]);

        $userRole = Role::where('nama_role', 'User')->first();

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2, // Set role_id as User
            'ruangan_id' => $request->ruangan_id
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    /**
     * Get lantai data based on selected gedung.
     */
    public function getLantaiByGedung(Request $request)
    {
        Log::info("Gedung ID diterima: " . $request->gedung_id);
    
        $lantais = Lantai::where('gedung_id', $request->gedung_id)->get(['id', 'nomor_lantai']);
    
        if ($lantais->isEmpty()) {
            return response()->json(['message' => 'Lantai tidak ditemukan'], 404);
        }
    
        return response()->json($lantais);
    }
    
    public function getRuanganByLantai(Request $request)
    {
        Log::info("Lantai ID diterima: " . $request->lantai_id);
    
        $ruangans = Ruangan::where('lantai_id', $request->lantai_id)->get(['id', 'kode_ruangan']);
    
        if ($ruangans->isEmpty()) {
            return response()->json(['message' => 'Ruangan tidak ditemukan'], 404);
        }
    
        return response()->json($ruangans);
    }
    
}