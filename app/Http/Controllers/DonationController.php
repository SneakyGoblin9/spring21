<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Http\Requests\DonationRequest;


class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::latest()->get();

        return view('donations.index',compact('donations'));
    }

    public function store(DonationRequest $request)
    {
        $donation = Donation::create($request->all());

        return redirect('/donations');

    }

    public function create()
    {
        return view('donations.create');
    }


    public function edit()
    {
        $donation = Donation::findOrFail($id);
        return view('donations.edit',compact(donation));
    }

    public function update(DonationRequest $request, $id)
    {
        $donation = Donation::findOrFail($id);
        $donation->update($request->all());

        return redirect('/donations');
    }

    public function destroy($id)
    {
        Donation::destroy($id);
        return response("success", 204);
    }
}