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
		$project = Project::find($id);

		$subdata = [
			'project' => $project,
			'start_date' => (new DateTime($project->start_date))->format('d-m-Y'),
			'end_date' => !is_null($project->end_date) ? (new DateTime($project->end_date))->format('d-m-Y') : null,
		];

		$data = [
			'subtitle' => sprintf('Project %s bewerken', $project->name),
			'content' => view('projects/update', $subdata)
		];

		return view('partials/layout', $data);
	}

	public function postUpdate(Request $request)
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
		$project = Project::find($request->input('id'));
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

	public function getDelete($id)
	{
		$subdata = [
			'project' => Project::find($id)
		];

		$data = [
			'subtitle' => 'Project verwijderen',
			'content' => view('projects/delete', $subdata)
		];

		return view('partials/layout', $data);
	}

	public function postDelete(Request $request)
	{
		$project = Project::find($request->input('id'));
		Project::destroy($project->id);

		return redirect()->action('ProjectController@getIndex')->with([
			'message' => sprintf('Het project <em>%s</em> is verwijderd', $project->name),
			'messageType' => 'success'
		]);
	}

	public function getDetails($id)
	{
		$subdata = [
			'project' => Project::find($id),
			'project_id' => $id
		];

		$data = [
			'subtitle' => 'Project bekijken',
			'content' => view('projects/details', $subdata)
		];

		return view('partials/layout', $data);
	}
}
