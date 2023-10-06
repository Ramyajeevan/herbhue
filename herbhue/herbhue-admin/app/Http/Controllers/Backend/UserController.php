<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\UserRepository;
use App\Http\Requests\Backend\SaveUser;
use App\Http\Requests\Backend\UpdateUser;


class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->userRepository->getAllUser();

        return view('Backend.User.index', ['user' => $user]);
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $user = $this->userRepository->getUser($id);
        if($user){
            return view('Backend.User.edit',['user'=>$user]);
        }else{
            return redirect()->route('user.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
          $post = [
            'status' => $request->status
        ];
        
        $updateUser = $this->userRepository->updateUser($post,$id);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->deleteUser($id);
        echo "User deleted successfully";

    }
}
?>