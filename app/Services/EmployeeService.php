<?php

namespace App\Services;

use App\Exceptions\GeneralException;
use App\Models\Employee;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class EmployeeService
 *
 */
class EmployeeService extends BaseService
{

    /**
     * Associated Repository Model.
     */
    const MODEL = Employee::class;


    /**
     * This function is for the create employee
     *
     * @param array $request
     * @return Employee
     * @throws GeneralException
     */
    public function create(array $request): Employee
    {
        try {
            return DB::transaction(
                function () use ($request) {
                    $employee = static::MODEL;
                    $employee = new $employee();
                    $employee->fill($request);
                    $employee->save();
                    return $employee;
                }
            );
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            throw new GeneralException(__('message.create_employee_error'));
        }
    }


    /**
     * This function is for the update employee
     *
     * @param object $employee
     * @param array $request
     * @return Employee
     * @throws GeneralException
     */
    public function update(object $employee, array $request): Employee
    {
        try {
            return DB::transaction(
                function () use ($employee, $request) {
                    // dd($request, $employee);
                    $employee->update($request);

                    return $employee;
                });
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            throw new GeneralException(__('message.update_employee_error'));
        }
    }
}