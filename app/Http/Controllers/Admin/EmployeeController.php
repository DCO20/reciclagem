<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEmployee;
use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $repository;

    public function __construct(Employees $employee)
    {
        $this->repository = $employee;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->repository->latest()->paginate();

        return view('admin.pages.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateemployee  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateEmployee $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('employees.index')->with('message', 'Funcionario criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$employee = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$employee = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateEmployee  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateemployee $request, $id)
    {
        if (!$employee = $this->repository->find($id)) {
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


        $employee->update($data);

        return redirect()->route('employees.index')->with('message', 'Funcionario editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$employee = $this->repository->find($id)) {
            return redirect()->back();
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('error', 'Funcionario excluído com sucesso.');
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

        $employees = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('email', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.employees.index', compact('employees', 'filters'));
    }
}
