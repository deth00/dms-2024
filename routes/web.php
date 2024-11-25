<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


    Route::get('/', App\Livewire\Auth\LoginComponent::class)->name('login');
    Route::get('/forgot_password/{id}', App\Livewire\Auth\ForgotPasswordComponent::class)->name('forgot-password');
    Route::get('/regis', App\Livewire\Auth\RegisComponent::class)->name('regis');
    Route::get('/regis-finish/{id}', App\Livewire\Auth\Regis2Component::class)->name('regis-finish');

    Route::get('/dashboard', App\Livewire\DashboardComponent::class)->name('dashboard');

    Route::get('/docc', App\Livewire\DoccComponent::class)->name('docc');
    Route::get('/log-docc', App\Livewire\LogDoccComponent::class)->name('log-docc');

    //Tag
    Route::get('/tag-me', App\Livewire\Tag\DocMeComponent::class)->name('tag-me');
    Route::get('/tag-sector', App\Livewire\Tag\DocSectorComponent::class)->name('tag-sector');
    Route::get('/tag-dpart', App\Livewire\Tag\DocDpartComponent::class)->name('tag-dpart');
    Route::get('/tag-private', App\Livewire\Tag\DocPrivateComponent::class)->name('tag-private');

    //Messager
    Route::get('/inbox', App\Livewire\Message\InboxComponent::class)->name('inbox');
    Route::get('/outbox', App\Livewire\Message\OutboxComponent::class)->name('outbox');
    Route::get('/read/{id}', App\Livewire\Message\ReadComponent::class)->name('read');
    Route::get('/sent', App\Livewire\Message\SentComponent::class)->name('sent');
    Route::get('/bookmark', App\Livewire\Message\BookmarkComponent::class)->name('bookmark');
    Route::get('/trash', App\Livewire\Message\TrashComponent::class)->name('trash');

    //Documentmdi mdi-file-document-box-multiple-outline
    Route::get('/document/{id}', App\Livewire\Document\DocumentComponent::class)->name('document');
    Route::get('/document-create/{id}', App\Livewire\Document\CreateComponent::class)->name('document-create');
    Route::get('/document-income/{id}', App\Livewire\Document\IncomeComponent::class)->name('document-income');
    Route::get('/document-edit/{id}', App\Livewire\Document\EditComponent::class)->name('document-edit');
    Route::get('/document-view/{id}', App\Livewire\Document\ViewComponent::class)->name('document-view');

    //Settings
    Route::get('/group', App\Livewire\Settings\GroupComponent::class)->name('group');
    Route::get('/dpart', App\Livewire\Settings\DocDpartComponent::class)->name('dpart');
    Route::get('/dpartment', App\Livewire\Settings\DocDpartmentComponent::class)->name('dpartment');
    Route::get('/doctype', App\Livewire\Settings\DocTypeComponent::class)->name('doctype');
    Route::get('/docgroup', App\Livewire\Settings\DocGroupComponent::class)->name('docgroup');
    Route::get('/docsheft', App\Livewire\Settings\DocSheftComponent::class)->name('docsheft');
    Route::get('/docdock', App\Livewire\Settings\DocDockComponent::class)->name('docdock');
    Route::get('/unit', App\Livewire\Settings\UnitCompomemt::class)->name('unit');
    Route::get('/sector', App\Livewire\Settings\SectorComponent::class)->name('sector');
    
    Route::get('/profile', App\Livewire\Auth\ProfileComponent::class)->name('profile');
    Route::get('/logout', App\Livewire\Auth\LoginComponent::class,'logout')->name('logout');

