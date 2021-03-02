<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCompanies;
use App\Http\Requests\StoreUpdateCompany;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $repository;

    public function __construct(Company $company)
    {
        $this->repository = $company;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->repository->latest()->paginate();

        return view('admin.pages.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatecompanies  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCompany $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('companies.index')->with('message', 'Empresa criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$company = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$company = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatecompanies  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCompany $request, $id)
    {
        if (!$company = $this->repository->find($id)) {
            return redirect()->back();
        }

        $data = $request->only([
        'name', 
        'responsible',
        'email',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'cell',
        'valor',
        'limit',
        ]);


        $company->update($data);

        return redirect()->route('companies.index')->with('message', 'Empresa editada editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$company = $this->repository->find($id)) {
            return redirect()->back();
        }

        $company->delete();

        return redirect()->route('companies.index')->with('error', 'Empresa excluída com sucesso.');
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

        $companies = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('email', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.companies.index', compact('companies', 'filters'));
    }
}