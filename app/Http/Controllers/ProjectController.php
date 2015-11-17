<?php

/**
 * This controller houses all project related code (CRUD).
 *
 * @author Sebastiaan Franken <sebastiaan@sebastiaanfranken.nl>
 */

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Project;
use Auth;
use DateTime;

class ProjectController extends Controller
{

	/**
	 * Returns a view with a list containing all the projects owned
	 * by the user.
	 *
	 * @return view
	 */
	public function getIndex()
	{
		$subdata = [
			'projects' => Auth::user()->projects
		];

		$data = [
			'subtitle' => 'Projectlijst',
			'content' => view('projects/index', $subdata)
		];

		return view('partials/layout', $data);
	}

	/**
	 * Shows the "create new project" page
	 *
	 * @return view
	 */
	public function getCreate()
	{
		$subdata = [
			'now' => (new DateTime())->format('d-m-Y')
		];

		$data = [
			'subtitle' => 'Nieuw project aanmaken',
			'content' => view('projects/create', $subdata)
		];

		return view('partials/layout', $data);
	}

	public function postCreate(Request $request)
	{
		$this->validate($request, [
			'name' => ['required'],
			'start_date' => ['required', 'date', 'date_format:d-m-Y'],
			'end_date' => ['date', 'date_format:d-m-Y'],
			'description' => ['string']
		]);

		/*
		 * Create a new project and assign all the table columns with the correct values
		 */
		$project = new Project;
		$project->name = $request->input('name');
		$project->user_id = Auth::user()->id;
		$project->start_date = (new DateTime($request->input('start_date')))->format('Y-m-d');

		if($request->has('end_date'))
		{
			$project->end_date = (new DateTime($request->input('end_date')))->format('Y-m-d');
		}

		if($request->has('description'))
		{
			$project->description = $request->input('description');
		}

		$project->save();

		return redirect()->action('ProjectController@getIndex')->with([
			'message' => sprintf('Je project <em>%s</em> is opgeslagen', $request->input('name')),
			'messageType' => 'success'
		]);
	}

	public function getUpdate($id)
	{
	}

	public function postUpdate(Request $request)
	{
	}

	public function getDelete($id)
	{
	}

	public function postDelete(Request $request)
	{
	}

	public function getDetails($id)
	{
	}
}
