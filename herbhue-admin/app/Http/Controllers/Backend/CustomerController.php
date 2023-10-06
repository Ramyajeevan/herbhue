<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\CustomerRepository;
use DB;

class CustomerController extends Controller
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
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
        $customer = $this->customerRepository->getAllCustomer();
        return view('Backend.Customer.index', ['customers' => $customer]);
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
             $customer = $this->customerRepository->getAllCustomer();
            return view('Backend.Customer.add', ['users' => $customer]);
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
        
       // print_r($_REQUEST);print_r($_FILES);exit;
       $exists=DB::table("tbl_user")->where("mobile",$request->mobile)->first();
       if(!$exists)
       {
       if($request->image!="")
       {
	        $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('images'), $imageName);
        
           
        
            $post = [
              "name"=>$request->name,
              "email"=>$request->email,
              "mobile"=>$request->mobile,
              "password"=>$request->password,
              "refer_by"=>$request->refer_by,
              "image"=>$imageName
            ];

       
            $save = $this->customerRepository->saveCustomer($post);
   
            return redirect()->route('customer.index')->with('success', 'Customer Added Successfully!');
        }else{
           return redirect()->back()->with('errors', 'Choose the Image of the customer!');
        }
       }
       else
       {
           return redirect()->back()->with('errors', 'Customer Already Exists!');
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
      
        $customer = $this->customerRepository->getCustomer($id);
        if($customer){
            return view('Backend.Customer.edit',['customer'=>$customer]);
        }else{
              return redirect()->route('customer.index');
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
        
       $exists=DB::table("tbl_user")->where("mobile",$request->mobile)->first();
       if($exists)
       {
               $imageName='';
               if($request->image!="")
               {
        	    $imageName = time().'.'.$request->image->extension();  
             
                $request->image->move(public_path('images'), $imageName);
        
                    $post = [
                      "name"=>$request->name,
                      "email"=>$request->email,
                      "mobile"=>$request->mobile,
                      "password"=>$request->password,
                      "refer_by"=>$request->refer_by,
                      "image"=>$imageName
                    ];
               }
               else
               {
                    $post = [
                      "name"=>$request->name,
                      "email"=>$request->email,
                      "mobile"=>$request->mobile,
                      "password"=>$request->password
                ];
                
               }
            $updatecustomer = $this->customerRepository->updateCustomer($post,$id);
            if($updatecustomer)
            {
                return redirect()->route('customer.index')->with('success', 'Customer Updated Successfully!');;
            }
            else
            {
               return redirect()->back()->with('errors', 'Error!');
            }
       }
       else
       {
           return redirect()->back()->with('errors', 'Customer Not Exists!');
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
        $customer = $this->customerRepository->deleteCustomer($id);
        echo "Customer deleted successfully";
    }
    
    public function changestatus(Request $request, $id)
    {
        $customer = $this->customerRepository->changestatus($id,$request->newstatus);
        echo "Status changed successfully";
    }
}
?>