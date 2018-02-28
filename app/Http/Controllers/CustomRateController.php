<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

//Get Model
use App\CustomRate;

class CustomRateController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Get all my current custom rates.
        $customRates = CustomRate::all();

       return view('custom_rate.index')->with('customRate',$customRates);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('custom_rate.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//Validate Information
        $validator = Validator::make($request->all(), [
            'custom_rate_name' => 'required',
            'amount'=>'required',
            'active'=>'required'
        ]);

        //Check validation of the input.
        if ($validator->fails())
        {
            //Go back to the prior page, but take along any input taht was submitted that was correct.
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        //Everything is okay, go ahead and continue making a custom rate.
        else {
            //Create New Rate
            $customRate = new CustomRate();
            //Rate Name
            $customRate->rate_name =  $request->input('custom_rate_name');
            //Rate Amount
            $customRate->rate_amount =  $request->input('amount');
            //Rate Active
            $customRate->rate_active  = $request->input('active');
            //Save Information
            $customRate ->save();

            //Redirect information
            return redirect()->route('customRate.index')->with('message','Your new rate for Coastal Quarters has been stored');
            }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//Find specific rate.
        $rateToEdit = CustomRate::find($id);
       //Go to page to edit said rate.
       return view('custom_rate.edit')->with('custom_rate',$rateToEdit);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		//Update the selected rate.
        $customRateToUpdate = CustomRate::find($id);
        //Update name
        $customRateToUpdate->rate_name = $request->input('rate_name');
        //Update amount
        $customRateToUpdate->rate_amount = $request->input('rate_amount');
        //Update active
        $customRateToUpdate->rate_active = $request->input('rate_active');
        //Save
        $customRateToUpdate->save();
        //Go back to index.
        return redirect()->route('customRate.index')->with('message','Your selected rate has been updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//Find a rate to remove
        $rateToRemove = CustomRate::find($id);
        //Delete the rate
        $rateToRemove->delete();
        //Go back to original index.
        return redirect()->route('customRate.index')->with('message','Your selected rate has been deleted.');
	}

}
