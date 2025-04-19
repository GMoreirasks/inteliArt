<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ebooks = Ebook::all();
        return view('ebooks.index', compact('ebooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ebooks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'cover_image' => 'nullable|image',
            'purchase_link' => 'required|url',
        ]);

        // Salva a imagem de capa se for enviada
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('ebooks', 'public');
        }

        // Cria o novo eBook
        Ebook::create($data);

        return redirect()->route('ebooks.index')->with('success', 'eBook criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ebook $ebook)
    {
        return view('ebooks.show', compact('ebook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ebook $ebook)
    {
        return view('ebooks.edit', compact('ebook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ebook $ebook)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'cover_image' => 'nullable|image',
            'purchase_link' => 'required|url',
        ]);

        // Atualiza a imagem de capa se for enviada
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('ebooks', 'public');
        }

        $ebook->update($data);

        return redirect()->route('ebooks.index')->with('success', 'eBook atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ebook $ebook)
    {
        // Deleta a capa do eBook, se existir
        if ($ebook->cover_image) {
            Storage::delete($ebook->cover_image);
        }

        // Deleta o eBook
        $ebook->delete();

        return redirect()->route('ebooks.index')->with('success', 'eBook excluído com sucesso!');
    }
}
