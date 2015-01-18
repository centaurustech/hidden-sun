<?php

class DonationsController extends \BaseController {

	public function donate(){
		//get project id
		$project_id = Input::get('project_id');

		// Use the config for the stripe secret key
		Stripe::setApiKey(Config::get('stripe.stripe.secret'));
		$amount = Input::get('amount');
		$amount_in_dollars = $amount / 100;

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
			return Redirect::to('donation-create')->withInput()->with(array('stripe_errors' => $error['message'], 'alert-type' => 'danger'));
		}
		// Enter the donation into the database. Donation totals are derived from this!
		
		$donation = new Donation();
		$donation->amount = $amount;
		$donation->stripe_charge_id = $charge->id;
		$donation->project_id = $project_id;

		$donation->save();

		return Redirect::action('ProjectsController@show', array('id' => $project_id))->with(array('thank_you_message' => true));
	}

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
					'custom_amount' => 'required|numeric|min:1|max:25000',
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
		$donation_amount_dollars = $donation_amount / 100;
		return View::make('donations.create')->with(array('donation_amount' => $donation_amount, 'donation_amount_dollars' => $donation_amount_dollars, 'project' => $project));
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
			return "Your donation could not be validated.";
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
	
}
