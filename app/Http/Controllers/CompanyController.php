<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyDataTable;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{

    /**
     * @var CompanyService
     */
    protected $companyService;
    
    /**
     * Boolean status code
     */
    const PATH = 'companies';
    const VIEW = 'admin.panel.companies';

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(CompanyService $companyService)
    {
        $this->title = trans('menu.side_menu.company');
        View()->share([
            'path' => self::PATH,
            'view' => self::VIEW,
            'title' => $this->title
        ]);
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompanyDataTable $dataTable)
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
        return view(self::VIEW . '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        try {
            $response = $this->companyService->create($request->all());
            if ($response) {
                return redirect(route(self::PATH.'.index'))
                    ->with('success', __('message.create_company_success'));
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return redirect()->back()->with('error', __('message.create_company_error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view(self::VIEW . '.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view(self::VIEW . '.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        try {
            $response = $this->companyService->update($company, $request->all());
            if ($response) {
                return redirect(route(self::PATH.'.index'))
                    ->with('success', __('message.update_company_success'));
            }
        } catch (\Exception $e) {
            Log::error($ex->getMessage());
        }
        return redirect()->back()->with('error', __('message.update_company_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if (Storage::exists('company/logo/'.$company->logo)) {
            Storage::delete('company/logo/'.$company->logo);
        }
        $company = $company->delete();
        if ($company) {
            return ["status" => 'success', "message" => __('message.delete_company_success')];
        } else {
            return ["status" => 'error', "message" => __('message.delete_company_error')];
        }
    }
}
