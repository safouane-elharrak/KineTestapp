<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Category
    Route::apiResource('categories', 'CategoryApiController');

    // Services
    Route::apiResource('services', 'ServicesApiController');

    // Patient
    Route::post('patients/media', 'PatientApiController@storeMedia')->name('patients.storeMedia');
    Route::apiResource('patients', 'PatientApiController');

    // Employe
    Route::post('employes/media', 'EmployeApiController@storeMedia')->name('employes.storeMedia');
    Route::apiResource('employes', 'EmployeApiController');

    // Session
    Route::apiResource('sessions', 'SessionApiController');

    // Session Line
    Route::post('session-lines/media', 'SessionLineApiController@storeMedia')->name('session-lines.storeMedia');
    Route::apiResource('session-lines', 'SessionLineApiController');

    // Payment
    Route::apiResource('payments', 'PaymentApiController');

    // Invoice
    Route::apiResource('invoices', 'InvoiceApiController');

    // Appointment
    Route::apiResource('appointments', 'AppointmentApiController');
});
