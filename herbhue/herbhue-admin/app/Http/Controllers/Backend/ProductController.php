<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\ProductRepository;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->productRepository->getAllProduct();


        return view('Backend.Product.index', ['product' => $product]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $category = $this->productRepository->getAllCategory();

        return view('Backend.Product.add', ['category' => $category]);
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
      
  
        $image1 = $request->file('image1');
        $imagename1 = time().'-1.'.$image1->extension();

        $destinationPath = public_path('images');
        $image1->move($destinationPath,$imagename1);
        
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

        
         $post = [
            'category_id'=> $request->category_id,
            'subcategory_id'=> $request->subcategory_id,
            'name' => $request->name,
           'description'=> $request->description,
           'describe'=> $request->describe,
           'wellness'=> $request->wellness,
            'image1'=>$imagename1,
            'image2'=>$imagename2,
            'image3'=>$imagename3,
            'image4'=>$imagename4,
            'image5'=>$imagename5
        ];
     
        $total_options=$request->total_options;
        for($i=0;$i<$total_options;$i++)
        {
          $qty="opt_qty_".$i;
          $qtytype="opt_qtytype_".$i;
          $price="opt_price_".$i;
          $mrp_price="opt_mrp_price_".$i;
          $stock="opt_stock_".$i;
        $post1[$i]=[
          'quantity'=>$request->$qty,
          'quantitytype'=>$request->$qtytype,
          'stock'=> $request->$stock,
          'price'=> $request->$price,
          'mrp_price'=> $request->$mrp_price
            ];
        }
          $save = $this->productRepository->saveProduct($post,$post1);
  

        if($save){
            return  redirect()->route('product.index')->with('success', 'Product Added Successfully!');
        }else{
           return redirect()->back()->with('errors','Product Already Exists!');
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
    public function edit(Request $request,$id)
    {
       
        $product = $this->productRepository->getProduct($id);
        if($product){
            $category = $this->productRepository->getAllCategory();
            $subcategory = $this->productRepository->getAllSubCategory($id);
            $productoptions=$this->productRepository->getAllProductOptions($id);
            return view('Backend.Product.edit',['category'=>$category,'subcategory'=>$subcategory,'productoptions'=>$productoptions,'product'=>$product]);
        }else{
            return redirect()->route('product.index');
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
        
        $post = [
            'category_id'=> $request->category_id,
            'subcategory_id'=> $request->subcategory_id,
            'name' => $request->name,
           'description'=> $request->description,
           'describe'=> $request->describe,
           'wellness'=> $request->wellness,
            'image1'=>$imagename1,
            'image2'=>$imagename2,
            'image3'=>$imagename3,
            'image4'=>$imagename4,
            'image5'=>$imagename5
        ];
     
        $total_options=$request->total_options;
        for($i=0;$i<$total_options;$i++)
        {
          $qty="opt_qty_".$i;
          $qtytype="opt_qtytype_".$i;
          $price="opt_price_".$i;
          $mrp_price="opt_mrp_price_".$i;
          $stock="opt_stock_".$i;
        $post1[$i]=[
          'quantity'=>$request->$qty,
          'quantitytype'=>$request->$qtytype,
          'stock'=> $request->$stock,
          'price'=> $request->$price,
          'mrp_price'=> $request->$mrp_price
            ];
        }
     
         $updateProduct = $this->productRepository->updateProduct($post,$post1,$id);

         if($updateProduct){
            return  redirect()->route('product.index')->with('success', 'Product Updated Successfully!');
        }else{
           return redirect()->back()->with('errors','Errot');
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
        $product = $this->productRepository->deleteProduct($id);
        echo "Product deleted successfully";

    }
    
    public function showsubcategory(Request $request)
    {
        $category_id=$request->category_id;
        $subcategory = $this->productRepository->showsubcategory($category_id);
        $html='';
        $html.='<select id="subcategory_id" name="subcategory_id" class="form-select"><option value="">Select SubCategory</option>';
        foreach($subcategory as $subcat)
        {
            $html.='<option value="'.$subcat->id.'">'.$subcat->name.'</option>';
        }
        $html.='</select>';
        echo $html;exit;
    }
     
}
?>