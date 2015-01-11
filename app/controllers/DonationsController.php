<?php

class DonationsController extends \BaseController {

	/**
	 * Display a listing of donations
	 *
	 * @return Response
	 */
	public function index()
	{
		$donations = Donation::all();

		return View::make('donations.index', compact('donations'));
	}

	/**
	 * Show the form for creating a new donation
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$donation_amount = Input::get('donation_amount');
		$project = Project::findOrFail($id);

		if ($donation_amount == 'custom'){

			$validator = Validator::make(Input::all(),
				array(
					'custom_amount' => 'required|numeric|max:25000',
					'donation_amount' => 'required'
				)
			);

			if($validator->fails()) {
				return Redirect::back()->withErrors($validator);
			} else{
				$donation_amount = Input::get('custom_amount');
			}
		} 

		//convert donation amount from dollars to cents
		$donation_amount = (integer)$donation_amount * 100;
		return View::make('donations.create')->with(array('donation_amount' => $donation_amount, 'project' => $project));
	}

	/**
	 * Store a newly created donation in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Donation::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Donation::create($data);

		return Redirect::route('donations.index');
	}

	/**
	 * Display the specified donation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$donation = Donation::findOrFail($id);

		return View::make('donations.show', compact('donation'));
	}

	/**
	 * Show the form for editing the specified donation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$donation = Donation::find($id);

		return View::make('donations.edit', compact('donation'));
	}

	/**
	 * Update the specified donation in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$donation = Donation::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Donation::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$donation->update($data);

		return Redirect::route('donations.index');
	}

	/**
	 * Remove the specified donation from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Donation::destroy($id);

		return Redirect::route('donations.index');
	}

	public function donate(){
		// Use the config for the stripe secret key
		Stripe::setApiKey(Config::get('stripe.stripe.secret'));
		$amount = Input::get('amount');

		// Get the credit card details submitted by the form
		$token = Input::get('stripeToken');

		// Create the charge on Stripe's servers - this will charge the user's card
		try {
			$charge = Stripe_Charge::create(array(
				"amount" 		=> $amount, // amount in cents
				"currency" 		=> "usd",
				"card"  		=> $token,
				"description" 	=> 'Film Seedr Donation')
			);
		} catch(Stripe_CardError $e) {
			$e_json = $e->getJsonBody();
			$error = $e_json['error'];
			// The card has been declined
			// redirect back to checkout page
			return Redirect::to('pay')->withInput()->with('stripe_errors',$error['message']);
		}
		// Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
		// Stripe charge was successfull, continue by redirecting to a page with a thank you message
		return "success";
	}

}
