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

        $imagename1='';
        $imagename2='';
        $imagename3='';
        $imagename4='';
        $imagename5='';
      
        if($request->file('image1')!='')
        {
        $image1 = $request->file('image1');
        $imagename1 = time().'-1.'.$image1->extension();

        $destinationPath = public_path('images');
        $image1->move($destinationPath,$imagename1);
        }
        if($request->file('image2')!='')
        {
            $image2 = $request->file('image2');
            $imagename2 = time().'-2.'.$image2->extension();
    
            $destinationPath = public_path('images');
            $image2->move($destinationPath,$imagename2);
        }
        
        if($request->file('image3')!='')
        {
            $image3 = $request->file('image3');
            $imagename3 = time().'-3.'.$image3->extension();
    
            $destinationPath = public_path('images');
            $image3->move($destinationPath,$imagename3);
        }
        
        if($request->file('image4')!='')
        {
            $image4 = $request->file('image4');
            $imagename4 = time().'-4.'.$image4->extension();
    
            $destinationPath = public_path('images');
            $image4->move($destinationPath,$imagename4);
        }
        
        if($request->file('image5')!='')
        {
            $image5 = $request->file('image5');
            $imagename5 = time().'-5.'.$image5->extension();
    
            $destinationPath = public_path('images');
            $image5->move($destinationPath,$imagename5);
        }


       $post=[
        "user_id"=>$request->user_id,
        "question"=>$request->question,
        'recommendation1'=>$request->recommendation1,
        'recommendation2'=>$request->recommendation2,
        'recommendation3'=>$request->recommendation3,
        'recommendation4'=>$request->recommendation4,
        'recommendation5'=>$request->recommendation5,
        'image1'=>$imagename1,
        'image2'=>$imagename2,
        'image3'=>$imagename3,
        'image4'=>$imagename4,
        'image5'=>$imagename5
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
            $recommendations = $this->personaliseRepository->getAllRecommendations($id);
           // dd($recommendations);
            return view('Backend.Personalise.edit',['personalise'=>$personalise,"users"=>$users,"recommendations"=>$recommendations]);
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

        $imagename1='';
        $imagename2='';
        $imagename3='';
        $imagename4='';
        $imagename5='';
      
        if($request->file('image1')!='')
        {
        $image1 = $request->file('image1');
        $imagename1 = time().'-1.'.$image1->extension();

        $destinationPath = public_path('images');
        $image1->move($destinationPath,$imagename1);
        }
        if($request->file('image2')!='')
        {
            $image2 = $request->file('image2');
            $imagename2 = time().'-2.'.$image2->extension();
    
            $destinationPath = public_path('images');
            $image2->move($destinationPath,$imagename2);
        }
        
        if($request->file('image3')!='')
        {
            $image3 = $request->file('image3');
            $imagename3 = time().'-3.'.$image3->extension();
    
            $destinationPath = public_path('images');
            $image3->move($destinationPath,$imagename3);
        }
        
        if($request->file('image4')!='')
        {
            $image4 = $request->file('image4');
            $imagename4 = time().'-4.'.$image4->extension();
    
            $destinationPath = public_path('images');
            $image4->move($destinationPath,$imagename4);
        }
        
        if($request->file('image5')!='')
        {
            $image5 = $request->file('image5');
            $imagename5 = time().'-5.'.$image5->extension();
    
            $destinationPath = public_path('images');
            $image5->move($destinationPath,$imagename5);
        }

        
        $post=[
            "user_id"=>$request->user_id,
            "question"=>$request->question,
            'recommendation1'=>$request->recommendation1,
            'recommendation2'=>$request->recommendation2,
            'recommendation3'=>$request->recommendation3,
            'recommendation4'=>$request->recommendation4,
            'recommendation5'=>$request->recommendation5,
            'image1'=>$imagename1,
            'image2'=>$imagename2,
            'image3'=>$imagename3,
            'image4'=>$imagename4,
            'image5'=>$imagename5
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
