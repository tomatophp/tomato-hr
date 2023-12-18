<?php


use Illuminate\Support\Facades\Route;

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('admin/departments/api', [DepartmentController::class, 'api'])->name('departments.api');
    Route::get('admin/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('admin/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('admin/departments/{model}', [DepartmentController::class, 'show'])->name('departments.show');
    Route::get('admin/departments/{model}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::post('admin/departments/{model}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('admin/departments/{model}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/attendance-shifts', [AttendanceShiftController::class, 'index'])->name('attendance-shifts.index');
    Route::get('admin/attendance-shifts/api', [AttendanceShiftController::class, 'api'])->name('attendance-shifts.api');
    Route::get('admin/attendance-shifts/create', [AttendanceShiftController::class, 'create'])->name('attendance-shifts.create');
    Route::post('admin/attendance-shifts', [AttendanceShiftController::class, 'store'])->name('attendance-shifts.store');
    Route::get('admin/attendance-shifts/{model}', [AttendanceShiftController::class, 'show'])->name('attendance-shifts.show');
    Route::get('admin/attendance-shifts/{model}/edit', [AttendanceShiftController::class, 'edit'])->name('attendance-shifts.edit');
    Route::post('admin/attendance-shifts/{model}', [AttendanceShiftController::class, 'update'])->name('attendance-shifts.update');
    Route::delete('admin/attendance-shifts/{model}', [AttendanceShiftController::class, 'destroy'])->name('attendance-shifts.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('admin/employees/api', [EmployeeController::class, 'api'])->name('employees.api');
    Route::get('admin/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('admin/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('admin/employees/{model}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('admin/employees/{model}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::post('admin/employees/{model}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('admin/employees/{model}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/employee-metas', [\EmployeeMetaController::class, 'index'])->name('employee-metas.index');
    Route::get('admin/employee-metas/api', [\EmployeeMetaController::class, 'api'])->name('employee-metas.api');
    Route::get('admin/employee-metas/create', [\EmployeeMetaController::class, 'create'])->name('employee-metas.create');
    Route::post('admin/employee-metas', [\EmployeeMetaController::class, 'store'])->name('employee-metas.store');
    Route::get('admin/employee-metas/{model}', [\EmployeeMetaController::class, 'show'])->name('employee-metas.show');
    Route::get('admin/employee-metas/{model}/edit', [\EmployeeMetaController::class, 'edit'])->name('employee-metas.edit');
    Route::post('admin/employee-metas/{model}', [\EmployeeMetaController::class, 'update'])->name('employee-metas.update');
    Route::delete('admin/employee-metas/{model}', [\EmployeeMetaController::class, 'destroy'])->name('employee-metas.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/employee-attendances', [\EmployeeAttendanceController::class, 'index'])->name('employee-attendances.index');
    Route::get('admin/employee-attendances/api', [\EmployeeAttendanceController::class, 'api'])->name('employee-attendances.api');
    Route::get('admin/employee-attendances/create', [\EmployeeAttendanceController::class, 'create'])->name('employee-attendances.create');
    Route::post('admin/employee-attendances', [\EmployeeAttendanceController::class, 'store'])->name('employee-attendances.store');
    Route::get('admin/employee-attendances/{model}', [\EmployeeAttendanceController::class, 'show'])->name('employee-attendances.show');
    Route::get('admin/employee-attendances/{model}/edit', [\EmployeeAttendanceController::class, 'edit'])->name('employee-attendances.edit');
    Route::post('admin/employee-attendances/{model}', [\EmployeeAttendanceController::class, 'update'])->name('employee-attendances.update');
    Route::delete('admin/employee-attendances/{model}', [\EmployeeAttendanceController::class, 'destroy'])->name('employee-attendances.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/employee-requests', [\EmployeeRequestController::class, 'index'])->name('employee-requests.index');
    Route::get('admin/employee-requests/api', [\EmployeeRequestController::class, 'api'])->name('employee-requests.api');
    Route::get('admin/employee-requests/create', [\EmployeeRequestController::class, 'create'])->name('employee-requests.create');
    Route::post('admin/employee-requests', [\EmployeeRequestController::class, 'store'])->name('employee-requests.store');
    Route::get('admin/employee-requests/{model}', [\EmployeeRequestController::class, 'show'])->name('employee-requests.show');
    Route::get('admin/employee-requests/{model}/edit', [\EmployeeRequestController::class, 'edit'])->name('employee-requests.edit');
    Route::post('admin/employee-requests/{model}', [\EmployeeRequestController::class, 'update'])->name('employee-requests.update');
    Route::delete('admin/employee-requests/{model}', [\EmployeeRequestController::class, 'destroy'])->name('employee-requests.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/employee-payments', [\EmployeePaymentController::class, 'index'])->name('employee-payments.index');
    Route::get('admin/employee-payments/api', [\EmployeePaymentController::class, 'api'])->name('employee-payments.api');
    Route::get('admin/employee-payments/create', [\EmployeePaymentController::class, 'create'])->name('employee-payments.create');
    Route::post('admin/employee-payments', [\EmployeePaymentController::class, 'store'])->name('employee-payments.store');
    Route::get('admin/employee-payments/{model}', [\EmployeePaymentController::class, 'show'])->name('employee-payments.show');
    Route::get('admin/employee-payments/{model}/edit', [\EmployeePaymentController::class, 'edit'])->name('employee-payments.edit');
    Route::post('admin/employee-payments/{model}', [\EmployeePaymentController::class, 'update'])->name('employee-payments.update');
    Route::delete('admin/employee-payments/{model}', [\EmployeePaymentController::class, 'destroy'])->name('employee-payments.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/employee-payrolls', [\EmployeePayrollController::class, 'index'])->name('employee-payrolls.index');
    Route::get('admin/employee-payrolls/api', [\EmployeePayrollController::class, 'api'])->name('employee-payrolls.api');
    Route::get('admin/employee-payrolls/create', [\EmployeePayrollController::class, 'create'])->name('employee-payrolls.create');
    Route::post('admin/employee-payrolls', [\EmployeePayrollController::class, 'store'])->name('employee-payrolls.store');
    Route::get('admin/employee-payrolls/{model}', [\EmployeePayrollController::class, 'show'])->name('employee-payrolls.show');
    Route::get('admin/employee-payrolls/{model}/edit', [\EmployeePayrollController::class, 'edit'])->name('employee-payrolls.edit');
    Route::post('admin/employee-payrolls/{model}', [\EmployeePayrollController::class, 'update'])->name('employee-payrolls.update');
    Route::delete('admin/employee-payrolls/{model}', [\EmployeePayrollController::class, 'destroy'])->name('employee-payrolls.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/employee-applies', [\EmployeeApplyController::class, 'index'])->name('employee-applies.index');
    Route::get('admin/employee-applies/api', [\EmployeeApplyController::class, 'api'])->name('employee-applies.api');
    Route::get('admin/employee-applies/create', [\EmployeeApplyController::class, 'create'])->name('employee-applies.create');
    Route::post('admin/employee-applies', [\EmployeeApplyController::class, 'store'])->name('employee-applies.store');
    Route::get('admin/employee-applies/{model}', [\EmployeeApplyController::class, 'show'])->name('employee-applies.show');
    Route::get('admin/employee-applies/{model}/edit', [\EmployeeApplyController::class, 'edit'])->name('employee-applies.edit');
    Route::post('admin/employee-applies/{model}', [\EmployeeApplyController::class, 'update'])->name('employee-applies.update');
    Route::delete('admin/employee-applies/{model}', [\EmployeeApplyController::class, 'destroy'])->name('employee-applies.destroy');
});
