<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDataTable;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{

    /**
     * @var EmployeeService
     */
    protected $employeeService;

    /**
     * Boolean status code
     */
    const PATH = 'employees';
    const VIEW = 'admin.panel.employees';

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(EmployeeService $employeeService)
    {
        $this->title = trans('menu.side_menu.employee');
        View()->share([
            'path' => self::PATH,
            'view' => self::VIEW,
            'title' => $this->title
        ]);
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render(self::VIEW . '.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = [];
        try {
            $companies = getCompanies();
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }
        return view(self::VIEW . '.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        try {
            $response = $this->employeeService->create($request->all());
            if ($response) {
                return redirect(route(self::PATH.'.index'))
                    ->with('success', __('message.create_employee_success'));
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return redirect()->back()->with('error', __('message.create_employee_error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view(self::VIEW . '.show', ['employee' => $employee->load('company')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = [];
        try {
            $companies = getCompanies();
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }
        return view(self::VIEW . '.edit', ['employee' => $employee, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        try {
            $response = $this->employeeService->update($employee, $request->all());
            if ($response) {
                return redirect(route(self::PATH.'.index'))
                    ->with('success', __('message.update_employee_success'));
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return redirect()->back()->with('error', __('message.update_employee_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee = $employee->delete();
        if ($employee) {
            return ["status" => 'success', "message" => __('message.delete_employee_success')];
        } else {
            return ["status" => 'error', "message" => __('message.delete_employee_error')];
        }
    }
}
