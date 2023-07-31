<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }





    /**
     * Insert the product details.
     */
    public function Store_product_details(Request $request){
        // print_r($request->all());

        $product = new product;
        $product->product_name = $request['P_name'];
        $product->product_price = $request['P_price'];
        $product->save();

        return redirect('/');
        // return redirect('dashboard');
    }


    /**
     * get the product details.
     */
    public function get_product_details(Request $request){
        $data = product::get();
        // print_r($data);
        // dd($data);
        // return view('crud_screen', ['data'=>$data]);
        return view('dashboard', ['data'=>$data]);
    }


    /**
     * edit the product details.
     */
    public function edit_product_details($id){
        $edit_product = product::where('id', $id)->first();
        // print_r($data);
        // dd($data);
        // return view('crud_screen', ['data'=>$data]);
        return view('dashboard', ['edit_product'=>$edit_product]);
    }
}
