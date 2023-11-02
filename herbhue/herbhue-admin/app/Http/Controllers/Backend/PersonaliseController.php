<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\PersonaliseRepository;
use DB;

class PersonaliseController extends Controller
{
    protected $personaliseRepository;

    public function __construct(PersonaliseRepository $personaliseRepository)
    {
        $this->personaliseRepository = $personaliseRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $email=$request->session()->get('username');
        $admin=DB::table("tbl_admin")->where("email",$email)->first();
        if($admin)
        {
        $personalise = $this->personaliseRepository->getAllPersonalise();

        return view('Backend.Personalise.index', ['personalise' => $personalise]);
        }
        else
            return redirect()->route('login')->with('errors', 'Admin Not Exists!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $email=$request->session()->get('username');
        $admin=DB::table("tbl_admin")->where("email",$email)->first();
        if($admin)
        {
            $users = $this->personaliseRepository->getAllUsers();
            return view('Backend.Personalise.add',["users"=>$users]);
        }
        else
            return redirect()->route('login')->with('errors', 'Admin Not Exists!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $post=[
        "user_id"=>$request->user_id,
        "question"=>$request->question
       ];
        
       
        $save = $this->personaliseRepository->savePersonalise($post);
        if($save){
            return redirect()->route('personalise.index')->with('success', 'Personalise Added Successfully!');;
        }else{
           return redirect()->back()->with('errors', 'Error.');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $personalise = $this->personaliseRepository->getPersonalise($id);
        if($personalise){
            $users = $this->personaliseRepository->getAllUsers();
            return view('Backend.Personalise.edit',['personalise'=>$personalise,"users"=>$users]);
        }else{
            return redirect()->route('Personalise.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $post=[
            "user_id"=>$request->user_id,
            "question"=>$request->question
           ];
      
        $updatepersonalise = $this->personaliseRepository->updatePersonalise($post,$id);
        if($updatepersonalise){
        return redirect()->route('personalise.index')->with('success', 'Personalise Updated Successfully!');;
       }
        else{
           return redirect()->back()->with('errors', 'Error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personalise = $this->personaliseRepository->deletePersonalise($id);
        echo "Personalise deleted successfully";
    }
}
