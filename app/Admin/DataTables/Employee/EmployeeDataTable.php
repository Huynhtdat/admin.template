<?php

namespace App\Admin\DataTables\Employee;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use App\Enums\Employee\EmployeeRoles;
use App\Enums\Gender;

class EmployeeDataTable extends BaseDataTable
{

    protected $nameTable = 'employeeTable';

    public function __construct(
        EmployeeRepositoryInterface $repository
    ){
        $this->repository = $repository;

        parent::__construct();
    }

    public function setView(){
        $this->view = [
            'action' => 'admin.employees.datatable.action',
            'fullname' => 'admin.employees.datatable.fullname',
        ];
    }

    public function setColumnSearch(){

        $this->columnAllSearch = [0, 1, 2, 3, 4, 5, 6];

        $this->columnSearchDate = [6];

        $this->columnSearchSelect = [
            [
                'column' => 4,
                'data' => Gender::asSelectArray()
            ]
        ];
        $this->columnSearchSelect = [
            [
                'column' => 5,
                'roles' => EmployeeRoles::asSelectArray()
            ]
        ];
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repository->getQueryBuilderOrderBy();
    }

    protected function setCustomColumns(){
        $this->customColumns = config('datatables_columns.employee', []);
    }

    protected function setCustomEditColumns(){
        $this->customEditColumns = [
            'fullname' => $this->view['fullname'],
            'gender' => function($employee){
                return $employee->gender->description();
            },
            'created_at' => '{{ format_date($created_at) }}'
        ];
    }

    protected function setCustomAddColumns(){
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(){
        $this->customRawColumns = ['fullname', 'action'];
    }
}
