<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMaterial;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    protected $repository;

    public function __construct(Material $material)
    {
        $this->repository = $material;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = $this->repository->latest()->paginate();

        return view('admin.pages.materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.materials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatematerial  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMaterial $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('materials.index')->with('message', 'Material criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$material = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$material = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.materials.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateMaterial  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatematerial $request, $id)
    {
        if (!$material = $this->repository->find($id)) {
            return redirect()->back();
        }

        $data = $request->only([
        'name', 
        'volume',
        'point',
        'street',
        'shelf_life',
        ]);


        $material->update($data);

        return redirect()->route('materials.index')->with('message', 'Material editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$material = $this->repository->find($id)) {
            return redirect()->back();
        }

        $material->delete();

        return redirect()->route('materials.index')->with('error', 'Material excluído com sucesso.');
    }

    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $materials = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.materials.index', compact('materials', 'filters'));
    }
}
