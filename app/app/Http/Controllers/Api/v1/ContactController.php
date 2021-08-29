<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Http\Services\AddNewContactService;
use App\Http\Services\DeleteContactService;
use App\Http\Services\GetAllUserContactsService;
use App\Http\Services\UpdateContactService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = app(GetAllUserContactsService::class)->getAllUserContacts(Auth::user());
        return ContactResource::collection($contacts);
    }


    public function store(Request $request)
    {
        if (app(AddNewContactService::class)->addNewContact(Auth::user(), $request)) {
            return response()->json(['Response' => 'created'], 201);
        }
    }


    public function show(int $id)
    {
        $result = app(GetAllUserContactsService::class)->getUserContactById($id);
        if ($result) {
            return new ContactResource($result);
        }
        return response()->json(['Response' => 'Not found'], 404);
    }


    public function update(Request $request, int $id)
    {
        if (app(UpdateContactService::class)->updateContactById($request, $id)) {
            return response()->json(['Response' => 'Updated']);
        }
        return response()->json(['Response' => 'Not found'], 404);
    }


    public function destroy(int $id)
    {
        if (app(DeleteContactService::class)->deleteById($id)) {
            return response()->json(['Response' => 'Success']);
        }
        return response()->json(['Response' => 'Not found'], 404);
    }
}
