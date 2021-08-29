<?php

namespace App\Http\Controllers;

use App\Http\Services\AddNewContactService;
use App\Http\Services\DeleteContactService;
use App\Http\Services\FavoritesService;
use App\Http\Services\GetAllUserContactsService;
use App\Http\Services\UpdateContactService;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = app(GetAllUserContactsService::class)->getAllUserContacts(Auth::user());
        View::share([
            'contacts' => $contacts
        ]);
        return view('test.home');
    }


    public function create()
    {
        return view('test_components.create');
    }


    public function store(Request $request)
    {
        app(AddNewContactService::class)->addNewContact(Auth::user(), $request);
        return redirect(route('home'));
    }


    public function edit($id)
    {
        View::share([
            'contact' => Contact::find($id),
        ]);
        return view('test_components.create');
    }


    public function update(Request $request, $id)
    {
        app(UpdateContactService::class)->updateContactById($request, $id);
        return redirect(route('home'));
    }


    public function destroy($id)
    {
        app(DeleteContactService::class)->deleteById($id);
        return redirect(route('home'));
    }

    public function changeFavoriteStatus($id)
    {
        return app(FavoritesService::class)->changeFavoriteById($id);
    }
}
