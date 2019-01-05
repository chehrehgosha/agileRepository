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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function seed(){
        City::truncate();
        District::truncate();
        User::truncate();
        Category::truncate();
        Product::truncate();
        Auction::truncate();
        Bid::truncate();
        $city = new City;
        $city->name = "تهران";
        $city->saveOrFail();
        $district = new District;
        $district->name = "طرشت";
        $district->city_id = $city->id;
        $district->saveOrFail();
        $user = new User;
        $user->name = "احمد";
        $user->family = "احمدی";
        $user->phone_number = "09122323234";
        $user->address = "احمدآباد";
        $user->verified = true;
        $user->email = "ahmad@ahmad.ahmad";
        $user->password = bcrypt('ahmad');
        $user->finance = 0;
        $user->isAdmin = true;
        $user->saveOrFail();
        $category = new Category;
        $category->name = "لباس";
        $category->saveOrFail();
        $product = new Product;
        $product->user_id = $user->id;
        $product->name = "کاپشن";
        $product->category_id = $category->id;
        $product->district_id = $district->id;
        $product->price = 1234;
        $product->attributes = "زیبا,جادار,مطمعن";
        $product->is_sold = false;
        $product->description = "کاپشنه دیگه";
        $product->saveOrFail();
        $auction = new Auction;
        $auction->user_id = $user->id;
        $auction->name = "کاپشن";
        $auction->category_id = $category->id;
        $auction->district_id = $district->id;
        $auction->base_price = 1234;
        $auction->attributes = "زیبا,جادار,مطمعن";
        $auction->description = "کاپشنه دیگه";
        $auction->product_id = $product->id;
        $auction->highest_bid = 0;
        $now = new DateTime();
        $auction->start_time = $now;
        date_add($now, date_interval_create_from_date_string('10 days'));
        $auction->end_time = $now;
        $auction->saveOrFail();
        echo $auction->id;
    }

    

    public function auctions(Request $request){
        $sql = 'select auctions.id, users.name as user_name,categories.name as category_name,districts.name as district_name,cities.name as city_name,attributes,description,auctions.name,base_price from auctions
        LEFT JOIN users ON auctions.user_id = users.id
        LEFT JOIN districts ON auctions.district_id = districts.id
        LEFT JOIN categories ON auctions.category_id = categories.id
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
            $where .= " auctions.attributes like '%" . $request->input('attributes') . "%' and";
        if($request->input('min_price')!="")
            $where .= " auctions.base_price >= '" . $request->input('min_price') . "' and";
        if($request->input('max_price')!="")
            $where .= " auctions.base_price <= '" . $request->input('max_price') . "' and";
        if($where != "")
            $where = "where ".substr($where, 0, -3);;
        try{
            $auctions = DB::select($sql.$where);
        } catch (\Exception  $e) {
            $auctions = [];
        }
        $request->input('name');
        return view('auctions', ['auctions' =>  $auctions]);
    }

    public function auction(Request $request,$auction_id){
        
        $sql = "select auctions.name as name,auctions.base_price,auctions.description,users.name as user_name,users.family as user_family,users.phone_number as user_phone_number,users.email as user_email,cities.name as city_name,districts.name as district_name,auctions.attributes from auctions 
            LEFT JOIN users ON auctions.user_id = users.id
            LEFT JOIN districts ON auctions.district_id = districts.id
            LEFT JOIN categories ON auctions.category_id = categories.id
            LEFT JOIN cities ON districts.city_id = cities.id 
            where auctions.id='".$auction_id."'";
        $auction = DB::select($sql);
        $auction = $auction[0];
        return view('auction', ['auction' =>  $auction,'attrs' => explode(',',$auction->attributes)]);
    }

}
