<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auction;
use App\Ad;
use App\Bid;
use App\Category;
use App\Charge;
use App\City;
use App\District;
use App\Product;
use App\User;
use App\VerifyUser;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function item(Request $request,$product_id){
        
        $sql = "select products.name as name,products.price,products.description,users.name as user_name,users.family as user_family,users.phone_number as user_phone_number,users.email as user_email,cities.name as city_name,districts.name as district_name,products.attributes from products 
            LEFT JOIN users ON products.user_id = users.id
            LEFT JOIN districts ON products.district_id = districts.id
            LEFT JOIN categories ON products.category_id = categories.id
            LEFT JOIN cities ON districts.city_id = cities.id 
            where products.id='".$product_id."'";
        $product = DB::select($sql);
        $product = $product[0];
        return view('products.item', ['product' =>  $product,'attrs' => explode(',',$product->attributes)]);
    }

    public function index(Request $request){
        $sql = 'select products.id, users.name as user_name,categories.name as category_name,districts.name as district_name,cities.name as city_name,attributes,description,products.name,price from products
        LEFT JOIN users ON products.user_id = users.id
        LEFT JOIN districts ON products.district_id = districts.id
        LEFT JOIN categories ON products.category_id = categories.id
        LEFT JOIN cities ON districts.city_id = cities.id
        ';
        $where = "";
        if($request->input('category')!="")
            $where .= " categories.name = '" . $request->input('category') . "' and";
        if($request->input('city')!="")
            $where .= " cities.name = '" . $request->input('city') . "' and";
        if($request->input('district')!="")
            $where .= " districts.name = '" . $request->input('district') . "' and";
        if($request->input('attributes')!="")
            $where .= " products.attributes like '%" . $request->input('attributes') . "%' and";
        if($request->input('min_price')!="")
            $where .= " products.price >= '" . $request->input('min_price') . "' and";
        if($request->input('max_price')!="")
            $where .= " products.price <= '" . $request->input('max_price') . "' and";
        if($where != "")
            $where = "where ".substr($where, 0, -3);;
        try{
            $products = DB::select($sql.$where);
        } catch (\Exception  $e) {
            $products = [];
        }
        $request->input('name');
        return view('products.index', ['products' =>  $products]);
    }

    public function add(Request $request){
        if ($request->isMethod('post')) {
            $category_id = (DB::select("select id from categories where name='" . $request->input('category') ."'"));
            if(count($category_id) > 0 )
                $category_id = $category_id[0]->id;
            else
                $category_id = Category::create(array('name' => $request->input('category')))->id;
            $city_id = (DB::select("select id from cities where name='" . $request->input('city') ."'"));
            if(count($city_id) > 0 )
                $city_id = $city_id[0]->id;
            else
                $city_id = City::create(array('name' => $request->input('city')))->id;
            $district_id = (DB::select("select id from districts where name='" . $request->input('district') ."' and city_id = '" . $city_id . "'"));
            if(count($district_id) > 0 )
                $district_id = $district_id[0]->id;
            else
                $district_id = District::create(array('city_id' => $city_id,'name' => $request->input('district')))->id;
            $city = (DB::select("select * from cities where name='" . $request->input('city') ."'"))[0];
            Product::create(array('user_id' => Auth::id(),'category_id' => $category_id,'district_id' => $district_id,
            'attributes' => $request->input('attributes'),'description' => $request->input('description'),'name' => $request->input('name'),
            'price' => $request->input('price'),'is_sold' => false));
        }else{
            $cities = City::all();
            $districts =  District::all();
            $categories =  Category::all();
            return view('products.add',['cities'=> $cities,'districts'=>$districts,'categories'=>$categories]);
        }
    }

    public function remove(){

    }

    public function edit(){
        
    }
}
