<?php

namespace App\Controllers;
use App\Models\ModeratorModel;
use App\Models\MuscleModel;
use App\Helpers\HelperTable;
use App\Models\ExerciseModel;
use App\Models\MusclesExercisedModel;
use App\Models\WorkoutModel;
use App\Models\ExercisesInWorkoutModel;
use App\Models\PostModel;
use App\Models\ClientModel;

class Moderator extends BaseController
{
    public function index(){
		$data = [];
		helper(['form']);
		$session = session();
		//If the user is a client, redirect them to the client controller
		if($session->get('userType') === 'Client'){
			return redirect()->to('/Client');
		}

		echo view('templates/moderatorheader', $data);
		echo view('moderatorhome');
		echo view('moderator_3_panels');
		echo view('templates/footer');
	}

	public function exercises(){
		$data = [];
		$musclesPerExercise = [];
		$musclesExercisedModel = new MusclesExercisedModel();
		$exercisemodel = new ExerciseModel();
		//Get every exercise in the database
		$data['exercise_data'] = $exercisemodel->listAll();
		//Get each muscle group for each exercise
		foreach($data['exercise_data']->getResult() as $row)
		{
			$musclesPerExercise[$row->ExName] = $musclesExercisedModel->MusclesInExercise($row->ExerciseID);
		}
		//Add these muscle groups to the data array
		$data['musclesExercised'] = $musclesPerExercise;
		echo view('templates/moderatorheader', $data);
		echo view('exercises',$data);
		echo view('templates/footer');
	}

	public function editExercise($exerciseID = null){
		$data = [];
		helper(['form']);
		$exerciseModel = new ExerciseModel();
		//Get the exercise details to populate the input fields for the form
		$data['exercise'] = $exerciseModel->getExercise($exerciseID);
		echo view('templates/moderatorheader', $data);
		echo view('editexercise',$data);
		echo view('templates/footer');
	}

	public function updateExercise(){
		$data = [];
		helper(['form']);
		$model = new ExerciseModel();
		//If the update exercise form was submitted
		if($this->request->getMethod() == 'post')
		{
			$rules = [
				'exerciseName' => 'required|max_length[45]',
				'description' => 'required|max_length[500]',
			];


			if(! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}
			else{
				//store the new Exercise information in our database
				$model = new ExerciseModel();
				$newData = [
					'ExerciseID' => $this->request->getpost('exid'),
					'ExName' => $this->request->getpost('exerciseName'),
					'ExDescription' => $this->request->getPost('description'),
					'ExGifPath' => $this->request->getPost('gifpath'),
					'ExNeedsEquipment' => $this->request->getPost('equipment'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success','successfuly Updated');
			}
		}

		$data['exercise'] = $model->getExercise($this->request->getPost('exid'));

		echo view('templates/moderatorheader', $data);
		echo view('editexercise',$data);
		echo view('templates/footer');
	}

	public function addExercise(){
		$data = [];

		if($this->request->getMethod() == 'post')
		{
			$rules = [
				'exerciseName' => 'required|max_length[45]',
				'equipment' => 'required',
				'description' => 'required|max_length[500]',
				'gifpath' => 'max_length[80]'
			];

			if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
			}

			else{

				$model = new ExerciseModel();
				$newData = [
					'ExName' => $this->request->getpost('exerciseName'),
					'ExDescription' => $this->request->getPost('description'),
					'ExGifPath' => $this->request->getPost('gifpath'),
					'ExNeedsEquipment' => $this->request->getPost('equipment'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashData('success','successfully added exercise');
				return redirect()->to('/exercises');
			}
		}


		echo view('templates/moderatorheader');
		echo view('addexercise');
		echo view('templates/footer');
	}

	public function removeExercise($exerciseID = null){
		$model = new ExerciseModel();
		$model->removeExercise($exerciseID);
		return redirect()->to('/exercises');
	}

	public function addWorkout(){
		$data = [];

		$exerciseModel = new ExerciseModel();
		$data['exercises'] = $exerciseModel->listAll()->getResult();
		if($this->request->getMethod() == 'post')
		{
			//$data['Exercises_chosen'] = $_POST['exercisesInWorkout'];
			$rules = [
				'workoutName' => 'required|max_length[30]',
				'totalDuration' => 'required',
				'featured' => 'required',
			];

			if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
			}

			else{
				$exercisesSelected = [];
				


					
				$model = new WorkoutModel();
				$newData = [
					'Name' => $this->request->getpost('workoutName'),
					'TotalDuration' => $this->request->getPost('totalDuration'),
					'UserMade' => 0,
					'Featured' => $this->request->getPost('featured'),
				];
				$model->save($newData);

				$exercisesInWorkoutModel = new ExercisesInWorkoutModel();
				$workoutID = $model->getUserMadeWorkout();
				for($i = 1; $i <=6; $i++){
					if($this->request->getPost('exercise'.$i.'ID')){
						$exercise = [
							'WorkoutID' => $workoutID,
							'ExerciseID' => $this->request->getPost('exercise'.$i.'ID'),
							'ExerciseDuration' => $this->request->getPost('exercise'.$i.'Duration'),
						];
					array_push($exercisesSelected,$exercise);
				}
				else{
					break;
				}
			}
				$exercisesInWorkoutModel->insertBatch($exercisesSelected);
				$session = session();
				$session->setFlashData('success','successfully added workout');
				return redirect()->to('/workouts');
			
		}

			echo view('templates/moderatorheader',$data);
			echo view('addworkout');
			echo view('templates/footer');
		}

	}
	public function removeWorkout($workoutID = null){
		$model = new WorkoutModel();
		$exercisesInWorkoutModel = new ExercisesInWorkoutModel();
		
		$exercisesInWorkoutModel->deleteWorkout($workoutID);
		$model->removeWorkout($workoutID);
		return redirect()->to('/workouts');
	}

	public function editWorkout($workoutID = null){

		$data = [];
		helper(['form']);
		$model = new WorkoutModel();
		$exerciseModel = new ExerciseModel();
		$exercisesInWorkout = [];
		$exercisesInWorkoutModel = new ExercisesInWorkoutModel();
		if($this->request->getMethod() == 'post')
		{
			$rules = [
				'workoutName' => 'required|max_length[30]',
				'totalDuration' => 'required',
				'featured' => 'required',
			];


			if(! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}
			else{
				//store the new Exercise information in our database
				$newData = [
					'WorkoutID' => $this->request->getPost('workoutID'),
					'Name' => $this->request->getPost('workoutName'),
					'TotalDuration' => $this->request->getPost('totalDuration'),
					'UserMade' => 0,
					'Featured' => $this->request->getPost('featured'),
				];

				$model->save($newData);
				$workoutID = $this->request->getPost('workoutID');

				for($i = 1; $i <=6; $i++){
					if($this->request->getPost('exercise'.$i.'ID')){
						$exercise = [
							'WorkoutID' => $workoutID,
							'ExerciseID' => $this->request->getPost('exercise'.$i.'ID'),
							'ExerciseDuration' => $this->request->getPost('exercise'.$i.'Duration'),
						];
					array_push($exercisesInWorkout,$exercise);
					}
				}
				$data['magicMike'] = $exercisesInWorkout;
				$exercisesInWorkoutModel->deleteWorkout($workoutID);
				$exercisesInWorkoutModel->insertBatch($exercisesInWorkout);
				$session = session();
				$session->setFlashdata('success','successfuly Updated');
				return redirect()->to('/workouts');
			}
		}
		$data['Workout'] = $model->getWorkout($workoutID)[0];
		$data['exercises'] = $exercisesInWorkoutModel->getExercisesByWorkout($workoutID)->getResult();
		$exerciseNames = $exerciseModel->listAll()->getResult();
		$bread = [];
		$counter = 0;
		foreach($exerciseNames as $exercise){
			$bread[$counter] = array($exercise->ExerciseID,$exercise->ExName);
			$counter++;
		}
		$data['exercise_names'] = $bread;		
		$data['all_exercises'] = $exerciseModel->listAll()->getResult();
		echo view('templates/moderatorheader', $data);
		echo view('editworkout');
		echo view('templates/footer');
	}

	public function addToFeatured($workoutID){
		$model = new WorkoutModel();
		$workout = $model->getWorkout($workoutID);
		$data = [];
		$workout = $workout[0];
		$workout['Featured'] = 1;
		$model->save($workout);
		return redirect()->to('/featured');
	}

	public function removeFromFeatured($workoutID){
		$model = new WorkoutModel();
		$workout = $model->getWorkout($workoutID);
		$data = [];
		$workout = $workout[0];
		$workout['Featured'] = 0;
		$model->save($workout);
		return redirect()->to('/featured');
	}

	public function exerciseList(){
		if($this->request->getMethod() == 'post'){

		}
	}

	public function clients(){
		$clientModel = new ClientModel();
		$data['clients'] = $clientModel->getClients();
		echo view('templates/moderatorheader',$data);
		echo view('clients');
		echo view('templates/footer');
	}
	
	public function viewClientPosts($clientID){
		$postModel = new PostModel();
		$clientModel = new ClientModel();
		$data['client'] = $clientModel->getClientById($clientID);
		$data['posts'] = $postModel->getAllPosts($clientID);
		echo view('templates/moderatorheader',$data);
		echo view('viewclientposts');
		echo view('templates/footer');
	}

	public function removePost($postID,$clientID){
		$postmodel = new PostModel();
		$postmodel->removePost($postID);
		return redirect()->to('/viewClientPosts/'.$clientID);
	}

}