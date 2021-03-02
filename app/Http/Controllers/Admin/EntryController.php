<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateentrie;
use App\Http\Requests\StoreUpdateEntry;
use App\Models\Client;
use App\Models\Entry;
use App\Models\Material;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    protected $repository;

    public function __construct(Entry $entry)
    {
        $this->repository = $entry;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = $this->repository->latest()->paginate();

        return view('admin.pages.entries.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::pluck('name', 'id');
        $materials = Material::pluck('name', 'id');
        return view('admin.pages.entries.create', compact('clients', 'materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateEntry   $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateEntry $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('entries.index')->with('message', 'Entrada criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $entry = Entry::findOrFail($id);
        $clients = Client::pluck('name', 'id');
        $materials = Material::pluck('name', 'id');

        return view('admin.pages.entries.show', compact('entry', 'clients', 'materials'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entry = Entry::findOrFail($id);
        $clients = Client::pluck('name', 'id');
        $materials = Material::pluck('name', 'id');

        return view('admin.pages.entries.edit', compact('entry','clients', 'materials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateEntry   $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateEntry $request, $id)
    {
        if (!$entry = $this->repository->find($id)) {
            return redirect()->back();
        }
        
        $data = $request->only([
        'client_id', 
        'client_id',
        'qntd',
        'total_points',
        'total_receive',
        ]);


        $entry->update($data);

        return redirect()->route('entries.index')->with('message', 'Entrada editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$entrie = $this->repository->find($id)) {
            return redirect()->back();
        }

        $entrie->delete();

        return redirect()->route('entries.index')->with('error', 'Entrada excluído com sucesso.');
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

        $entries = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('email', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.entries.index', compact('entries', 'filters'));
    }
}
