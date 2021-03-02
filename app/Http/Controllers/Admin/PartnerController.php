<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePartner;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    protected $repository;

    public function __construct(Partner $partner)
    {
        $this->repository = $partner;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = $this->repository->latest()->paginate();

        return view('admin.pages.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatepartner  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePartner $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('partners.index')->with('message', 'Parceiro criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$partner = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$partner = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatepartner  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePartner $request, $id)
    {
        if (!$partner = $this->repository->find($id)) {
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


        $partner->update($data);

        return redirect()->route('partners.index')->with('message', 'Parceiro editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$partner = $this->repository->find($id)) {
            return redirect()->back();
        }

        $partner->delete();

        return redirect()->route('partners.index')->with('error', 'Parceiro excluído com sucesso.');
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

        $partners = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('email', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.partners.index', compact('partners', 'filters'));
    }
}
