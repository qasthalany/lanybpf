<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //git
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|max:10',
            'email' => ['required', 'email'],
            'pertanyaan' => 'required|max:300|min:8',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email Tidak valid'
        ]);

        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['pertanyaan'] = $request->pertanyaan;

        // simpan ke session supaya bisa dibaca di halaman respon
    session(['question_data' => $data]);

    return redirect()->route('home')->with('info', 'Data berhasil disimpan!');
    }

    public function respon()
{
    $data = session('question_data');

    // kalau session kosong (misal buka /question/respon langsung), kembali ke home
    if (!$data) {
        return redirect()->route('home');
    }

    return view('home-question-respon', $data);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
