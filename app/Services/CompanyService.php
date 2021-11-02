<?php

namespace App\Services;

use App\Exceptions\GeneralException;
use App\Models\Company;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * Class CompanyService
 *
 */
class CompanyService extends BaseService
{

    /**
     * Associated Repository Model.
     */
    const MODEL = Company::class;


    /**
     * This function is for the create company
     *
     * @param array $request
     * @return Company
     * @throws GeneralException
     */
    public function create(array $request): Company
    {
        try {
            return DB::transaction(
                function () use ($request) {
                    $company = static::MODEL;
                    $company = new $company();
                    if(!empty($request['logo'])){
                        $fileName = time() . '.' . $request['logo']->getClientOriginalExtension();
                        $resizeImage = \Image::make($request['logo']->getPathname());
                        $resizeImage->resize(100, 100, function ($constraint) {
                            $constraint->aspectRatio();
                        })->stream();
                        Storage::put('company/logo/' . $fileName, $resizeImage);
                        $request['logo'] = $fileName;
                    }
                    $company->fill($request);
                    $company->save();
                    return $company;
                }
            );
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            throw new GeneralException(__('message.create_company_error'));
        }
    }


    /**
     * This function is for the update company
     *
     * @param object $company
     * @param array $request
     * @return Company
     * @throws GeneralException
     */
    public function update(object $company, array $request): Company
    {
        try {
            return DB::transaction(
                function () use ($company, $request) {
                    if (!empty($request['logo'])) {
                        if (Storage::exists('company/logo/'.$company->logo)) {
                            Storage::delete('company/logo/'.$company->logo);
                        }
                        $fileName = time() . '.' . $request['logo']->getClientOriginalExtension();
                        $resizeImage = \Image::make($request['logo']->getPathname());
                        $resizeImage->resize(100, 100, function ($constraint) {
                            $constraint->aspectRatio();
                        })->stream();
                        Storage::put('company/logo/' . $fileName, $resizeImage);
                        $request['logo'] = $fileName;
                    }
                    $company->update($request);

                    return $company;
                });
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            throw new GeneralException(__('message.update_company_error'));
        }
    }
}