<?php

class UsersVoluntaryWorksController extends \BaseController {

	/**
	 * Display a listing of usersvoluntaryworks
	 *
	 * @return Response
	 */
	public function index()
	{
		$employee_no = Auth::getUser()->employee_no;
		$voluntaryworks = UsersVoluntaryWork::where('employee_no', '=', $employee_no)->get();

		return View::make('employees.usersVoluntaryWorks.index', compact('voluntaryworks'));
	}

	/**
	 * Show the form for creating a new usersvoluntarywork
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('employees.usersVoluntaryWorks.create');
	}

	/**
	 * Store a newly created usersvoluntarywork in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), UsersVoluntaryWork::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data['employee_no'] = Auth::getUser()->employee_no;

		UsersVoluntaryWork::create($data);
        Session::flash('success', 'Successfully added a new voluntary work');
		return Redirect::route('employees.pds.voluntary-works.index');
	}

	/**
	 * Display the specified usersvoluntarywork.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$usersvoluntarywork = UsersVoluntaryWork::findOrFail($id);

		return View::make('employees.usersVoluntaryWorks.show', compact('usersvoluntarywork'));
	}

	/**
	 * Show the form for editing the specified usersvoluntarywork.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usersvoluntarywork = Usersvoluntarywork::find($id);

		return View::make('employees.usersvoluntaryworks.edit', compact('usersvoluntarywork'));
	}

	/**
	 * Update the specified usersvoluntarywork in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$usersvoluntarywork = UsersVoluntaryWork::findOrFail($id);

		$validator = Validator::make($data = Input::all(), UsersVoluntaryWork::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$usersvoluntarywork->update($data);
        Session::flash('success', 'Successfully updated a voluntary work');
		return Redirect::route('employees.pds.voluntary-works.index');
	}

	/**
	 * Remove the specified usersvoluntarywork from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		UsersVoluntaryWork::destroy($id);

		return Redirect::route('employees.pds.voluntary-works.index');
	}

}
