<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->paginate(5);

        return view('projects.index', compact('projects')) //  untuk meanmpilkan semua yang ada di database
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create'); //  untuk mengarah ke view/project/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ //  untuk membuat form validasi pada laravel
            'nama' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'photo' => 'required'
        ]);

        $bb = Project::create($request->all()); // membuat atau menginputkan data ke dalam database
        if ($request -> file('photo')) {
            $request -> file('photo')-> move('photobrg/', $request -> file('photo')->getClientOriginalName());//memindahkan data atau file yang di inputkan ke dalam folder
            $bb -> photo = $request -> file('photo')-> getClientOriginalName(); // mengambil nama file
            $bb -> save(); // menyimpan data ke dalam database
        }
        return redirect()->route('projects.index')
            ->with('success', 'Berhasil ditambahkan.'); // kembali ke index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project')); //menampilkan detail barang
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project')); // mengedit value data barang
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([ // untuk membuat form validasi pada laravel
            'nama' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'photo' => 'required'
        ]);
        $project->update($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Berhasil diupdate');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index') // menghapus data
            ->with('success', 'Berhasil dihapus');
    }
}
