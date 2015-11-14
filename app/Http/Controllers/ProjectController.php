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
			'content' => view('project/index', $subdata)
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
		$data = [
			'subtitle' => 'Nieuw project aanmaken',
			'content' => view('project/create')
		];

		return view('partials/layout', $data);
	}

	public function postCreate(Request $request)
	{
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
