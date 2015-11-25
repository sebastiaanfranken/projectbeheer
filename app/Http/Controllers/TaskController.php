<?php

/**
 * This controllerhouses all task related code (CRUD).
 *
 * @author Sebastiaan Franken <sebastiaan@sebastiaanfranken.nl>
 */

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Task;
use App\Project;
use Auth;
use DateTime;

class TaskController extends Controller
{

	/**
	 * Returns a view with a list containing the tasks
	 *
	 * @return view
	 */
	public function getIndex()
	{
		$subdata = [
			'tasks' => Auth::user()->tasks
		];

		$data = [
			'subtitle' => 'Takenlijst',
			'content' => view('tasks/index', $subdata)
		];

		return view('partials/layout', $data);
	}

	/**
	 * Returns a view with a list containing all tasks
	 * for a certain project
	 *
	 * @param int $id The project ID
	 * @return view
	 */
	public function getTasksForProject($id)
	{
		/*
		 * Get the parent project first
		 */
		$project = Project::find($id);

		/*
		 * Get all tasks belonging to the
		 * parent project
		 */
		$tasks = $project->tasks();

		$subdata = [
			'project' => $project,
			'tasks' => $tasks
		];

		$data = [
			'subtitle' => sprintf('Taken bij project %s', $project->name),
			'content' => view('tasks/for-project', $subdata)
		];

		return view('partials/layout', $data);
	}

	/**
	 * Shows the create task form
	 *
	 * @return view
	 */
	public function getCreate($parent = null)
	{
		$subdata = [
			'projects' => Auth::user()->projects,
			'now' => (new DateTime())->format('d-m-Y'),
			'parent_id' => $parent
		];

		$data = [
			'subtitle' => 'Taak toevoegen',
			'content' => view('tasks/create', $subdata)
		];

		return view('partials/layout', $data);
	}

	/**
	 * Handles form input from getCreate and
	 * processes the form
	 *
	 * @return view
	 */
	public function postCreate(Request $request)
	{
		$this->validate($request, [
			'project_id' => ['required'],
			'name' => ['required'],
			'start_date' => ['required', 'date', 'date_format:d-m-Y'],
			'end_date' => ['date', 'date_format:d-m-Y'],
			'description' => ['string']
		]);

		/*
		 * Create a new task
		 */
		$task = new Task;
		$task->project_id = $request->input('project_id');
		$task->name = $request->input('name');
		$task->description = $request->input('description');
		$task->user_id = Auth::user()->id;
		$task->start_date = (new DateTime($request->input('start_date')))->format('Y-m-d');

		if($request->has('end_date'))
		{
			$task->end_date = (new DateTime($request->input('end_date')))->format('Y-m-d');
		}

		if($request->has('description'))
		{
			$task->description = $request->input('description');
		}

		if($request->has('parent_id'))
		{
			$task->parent_id = $request->input('parent_id');
		}

		$task->save();

		$name = $request->input('name');
		$project = Project::find($request->input('project_id'))->name;

		return redirect()->action('TaskController@getIndex')->with([
			'message' => sprintf('De taak <em>%s</em> bij project <em>%s</em> is opgeslagen', $name, $project),
			'messageType' => 'success'
		]);
	}
}
