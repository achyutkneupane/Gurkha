<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index() {
        $type = 'all';
        $shift = 'all';
        $trainings = Training::with('attendance')->get();
        return view('trainings.index', compact('trainings','type','shift'));
    }
    public function list(Request $request) {
        $type = 'all';
        $shift = 'all';
        
        $trainings = Training::with('attendance')->get();

        if($request->has('type') && $request->type != 'all') {
            $type = $request->type;
            $trainings = $trainings->where('type', $type);
        }
        
        if($request->has('shift') && $request->shift != 'all') {
            $shift = $request->shift;
            $trainings = $trainings->where('shift', $shift);
        }

        return view('trainings.index', compact('trainings','type','shift'));
    }
    public function create() {
        return view('trainings.create');
    }
    public function store(Request $request) {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'for_date' => 'required',
            'shift' => 'required',
        ]);
        $training = Training::create($request->all());
        return redirect()->route('trainings.show', $training);
    }
    public function show(Training $training) {
        return view('trainings.show', compact('training'));
    }
    public function attendance(Training $training) {
        if($training->completed) return redirect()->route('trainings.show', $training->id);
        $students = User::where('role', 'user')->get()->filter(function($user) {
            return $user->isFilled();
        });
        return view('trainings.attendance', compact('training','students'));
    }
    public function storeAttendance(Request $request) {
        $trainingId = $request->training_id;
        $training = Training::find($trainingId);
        if($training->completed) return redirect()->route('trainings.show', $trainingId);
        $attendanceData = collect($request->all())->except('_token','training_id');
        $attendanceData->map(function($attendance,$key) use ($training) {
            $userId = explode('-', $key)[1];
            $training->attendance()->create([
                'user_id' => $userId,
                'attended' => $attendance == 'present' ? true : false,
            ]);
        });
        $training->completed = true;
        $training->save();
        return redirect()->route('trainings.show', $trainingId);
    }
}
