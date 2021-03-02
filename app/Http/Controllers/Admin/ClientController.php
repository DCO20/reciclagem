<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateClient;
use App\Models\Client;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $repository;

    public function __construct(Client $client)
    {
        $this->repository = $client;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->repository->latest()->paginate();
        
        return view('admin.pages.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateclient  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateClient $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('clients.index')->with('message', 'Cliente criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$client = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$client = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateclient  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateclient $request, $id)
    {
        if (!$client = $this->repository->find($id)) {
            return redirect()->back();
        }

        $data = $request->only([
        'name', 
        'email',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'cell',]);


        $client->update($data);

        return redirect()->route('clients.index')->with('message', 'Cliente editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$client = $this->repository->find($id)) {
            return redirect()->back();
        }

        $client->delete();

        return redirect()->route('clients.index')->with('error', 'Cliente excluído com sucesso.');
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

        $clients = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('email', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.clients.index', compact('clients', 'filters'));
    }
}