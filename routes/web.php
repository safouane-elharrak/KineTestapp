<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServicesController');

    // Patient
    Route::delete('patients/destroy', 'PatientController@massDestroy')->name('patients.massDestroy');
    Route::post('patients/media', 'PatientController@storeMedia')->name('patients.storeMedia');
    Route::post('patients/ckmedia', 'PatientController@storeCKEditorImages')->name('patients.storeCKEditorImages');
    Route::resource('patients', 'PatientController');

    // Employe
    Route::delete('employes/destroy', 'EmployeController@massDestroy')->name('employes.massDestroy');
    Route::post('employes/media', 'EmployeController@storeMedia')->name('employes.storeMedia');
    Route::post('employes/ckmedia', 'EmployeController@storeCKEditorImages')->name('employes.storeCKEditorImages');
    Route::resource('employes', 'EmployeController');

    // Session
    Route::delete('sessions/destroy', 'SessionController@massDestroy')->name('sessions.massDestroy');
    Route::resource('sessions', 'SessionController');

    // Session Line
    Route::delete('session-lines/destroy', 'SessionLineController@massDestroy')->name('session-lines.massDestroy');
    Route::post('session-lines/media', 'SessionLineController@storeMedia')->name('session-lines.storeMedia');
    Route::post('session-lines/ckmedia', 'SessionLineController@storeCKEditorImages')->name('session-lines.storeCKEditorImages');
    Route::resource('session-lines', 'SessionLineController');

    // Payment
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');

    // Invoice
    Route::delete('invoices/destroy', 'InvoiceController@massDestroy')->name('invoices.massDestroy');
    Route::get('/invoices/findPrice','InvoiceController@findPrice')->name('invoices.findPrice');
    Route::get('/invoices/pdf/{id}', 'InvoiceController@pdf')->name('invoices.pdf');
    Route::resource('invoices', 'InvoiceController');
    

    // Appointment
    Route::delete('appointments/destroy', 'AppointmentController@massDestroy')->name('appointments.massDestroy');
    Route::resource('appointments', 'AppointmentController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
