<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Contacts extends Controller
{

    private function format(Object $data, Bool $error = false) {
        $obj = new \stdClass();
        $obj->data = $data;
        $obj->status = $error ? 'error' : 'success';
        if( $error) {
            return Response('', 500);
        }
        return Response()->json($obj);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return $this->format(Contact::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cont = new Contact();
        $cont->name = $request->name;
        $cont->email = $request->email;
        $cont->phone = $request->phone;
        try {
            $cont->save();
            return $this->format($cont);
        } catch (\Throwable $th) {
            return $this->format(new \stdClass(), true);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return $this->format($contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        try {
            $contact->save();
            return $this->format($contact);
        } catch (\Throwable $th) {
            return $this->format(new \stdClass(), true);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return $this->format(new \stdClass());
    }
}
