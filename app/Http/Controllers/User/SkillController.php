<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Skill;
use App\Models\User;

class SkillController extends Controller
{
        public function __construct()
        {
            $this->middleware("user",['except'=>'userdata']);
        }
        public function storeSkill(Request $request){
            $request->validate([
                'proficiency' => 'required',
                'skill_id' => 'required',
                'year_of_experience' => 'required'
            ]);
    
            $proficiency = $request->proficiency;
            $year_of_experience = $request->year_of_experience;
            $skill_id = $request->skill_id;
    
            Auth::user()->skills()->attach($skill_id);
    
            $skill = Auth::user()->skills->where("id" , $skill_id)->first();
            $skill->pivot->proficiency = $request["proficiency"];
            $skill->pivot->year_of_experience = $request["year_of_experience"];
            $skill->pivot->save();
            return redirect()->route('user.edit',auth()->id());
        }
    
        public function editSkill($skill_id){
            $skill = Auth::user()->skills()->where('skill_id' , $skill_id)->first();
            return view('user.skills.edit' , compact("skill"));
        }
    
        public function updateSkill(Request $request ,$skill_id){
    
            $request->validate([
                'proficiency' => 'required',
                'year_of_experience' => 'required'
            ]);
    
            $proficiency = $request->proficiency;
            $year_of_experience = $request->year_of_experience;
    
            $skill = Auth::user()->skills->where("id" , $skill_id)->first();
            $skill->pivot->proficiency = $request["proficiency"];
            $skill->pivot->year_of_experience = $request["year_of_experience"];
            $skill->pivot->save();
            return redirect()->route('user.edit',Auth::user()->id);
        }
        public function deleteUserSkill(Skill $skill){
            $skill->users()->detach(Auth::user()->id);
            return redirect()->route('user.edit',Auth::user()->id);
        }
}
