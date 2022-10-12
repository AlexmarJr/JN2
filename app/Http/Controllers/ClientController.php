<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index() {
        return Client::whereNull('deleted')->get();
    }

    public function store(Request $request) {
        try {
            Client::Create($request->all()); //Transformar Request em array
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($id) {
        return Client::find($id);
    }

    public function update(Request $request, $id) {
        $client = Client::find($id);
        $client->fill($request->all());

        try {
            return $client->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id) {
        $client = Client::find($id);
        $client->deleted = \Carbon\Carbon::now();
        return $client->save();
    }

    public function searchPlate($plate) {
        return Client::where('license_plate', 'LIKE', '%' . $plate . '%')->get();
    }
}
