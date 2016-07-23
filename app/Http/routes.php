<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/address', function() {

    return \Shippo_Address::create([
        'object_purpose' => 'QUOTE',
        'name' => 'John Smith',
        'company' => 'Initech',
        'street1' => 'Greene Rd.',
        'street_no' => '6512',
        'street2' => '',
        'city' => 'Woodridge',
        'state' => 'IL',
        'zip' => '60517',
        'country' => 'US',
        'phone' => '123 353 2345',
        'email' => 'jmercouris@iit.com',
        'metadata' => 'Customer ID 234;234'
    ]);

});

Route::get('/rates', function() {
    $fromAddress = array(
    'object_purpose' => 'PURCHASE',
    'name' => 'Shippo Itle"',
    'company' => 'Shippo',
    'street1' => '215 Clayton St.',
    'city' => 'San Francisco',
    'state' => 'CA',
    'zip' => '94117',
    'country' => 'US',
    'phone' => '+1 555 341 9393',
    'email' => 'support@goshipppo.com');

// example fromAddress
$toAddress = array(
    'object_purpose' => 'PURCHASE',
    'name' => 'Mr Hippo"',
    'company' => 'San Diego Zoo"',
    'street1' => '2920 Zoo Drive"',
    'city' => 'San Diego',
    'state' => 'CA',
    'zip' => '92101',
    'country' => 'US',
    'phone' => '+1 555 341 9393',
    'email' => 'hippo@goshipppo.com');

// example parcel
$parcel = array(
    'length'=> '5',
    'width'=> '5',
    'height'=> '5',
    'distance_unit'=> 'in',
    'weight'=> '2',
    'mass_unit'=> 'lb',
);
echo "<Pre>";
    return \Shippo_Shipment::create(
array(
    'object_purpose'=> 'PURCHASE',
    'address_from'=> $fromAddress,
    'address_to'=> $toAddress,
    'parcel'=> $parcel,
    'submission_type'=> 'PICKUP',
    'insurance_amount'=> '30',
    'insurance_currency'=> 'USD'
));
});

Route::get('/ratelist', function() {
    $shipment["object_status"] = "QUEUED"; 
    $shipment["object_id"] = "a7434d24f27545898507700b1d012fbe";
    $ratingStartTime=time();
while (($shipment["object_status"] == "QUEUED" || $shipment["object_status"] == "WAITING")){
    $shipment = Shippo_Shipment::retrieve($shipment["object_id"]);
    sleep(0.2);
    if (time()-$ratingStartTime>25) break;    
    }

    // Get all rates for shipment.

$rates = Shippo_Shipment::get_shipping_rates(array('id'=> $shipment["object_id"]));
echo "<Pre>";
$rate = $rates["results"][0];
//return $rate;
return $rates;
});

Route::get('/transaction', function() {
    $transaction["object_status"] = "QUEUED";
    $transaction["object_id"] = "a7434d24f27545898507700b1d012fbe";
    $transactionStartTime=time();
while (($transaction["object_status"] == "QUEUED" || $transaction["object_status"] == "WAITING")){
    $transaction = Shippo_Transaction::retrieve($transaction["object_id"]);
    sleep(0.2);
    if (time()-$transactionStartTime>25) break;
    }

// label_url and tracking_number
if ($transaction["object_status"] == "SUCCESS"){
    echo($transaction["label_url"]);
    echo("\n");
    echo($transaction["tracking_number"]);
}else {
    echo($transaction["messages"]);
}
echo "<Pre>";
return $transaction;
});

Route::get('/',function() {
	return view('Employee.index');
});

Route::get('employees/{id?}','EmployeeController@index');
Route::post('employees','EmployeeController@store');
Route::post('employees/{id}','EmployeeController@update');
Route::delete('employees/{id}','EmployeeController@destroy');


/*Route::post('/api/v1/employees', 'Employees@store');
Route::post('/api/v1/employees/{id}', 'Employees@update');
Route::delete('/api/v1/employees/{id}', 'Employees@destroy');*/




/*Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

});*/
/*Route::get('/','Front@index');
Route::get('/products/categories/{catid}',array('as'=>'product.category','uses'=>'Front@product_categories'))->where('catid','[1-9][0-9]*');
Route::get('/products/brands/{brandid}',array('as'=>'product.brands','uses'=>'Front@product_brands'))->where('brandid','[1-9][0-9]*');*/

/*Route::get('hello','Hello@index');
Route::get('hello/{name}','Hello@show');*/
/*Route::resource('test','TestController');
Route::get('/','Front@index');
Route::get('/products','Front@products');
Route::get('/products/details/{id}',array('as'=>'product.detail','uses'=>'Front@product_detail'))->where('id','[1-9][0-9]*');
Route::get('/products/categories',array('as'=>'product.category','uses'=>'Front@product_categories'));
Route::get('/products/brands',array('as'=>'product.brands','uses'=>'Front@product_brands'));
Route::get('/blog',array('as'=>'blog','uses'=>'Front@blog'));
Route::get('/blog/post/{id}',array('as'=>'blog.post','uses'=>'Front@blog_post'))->where('id','[1-9][0-9]*');
Route::get('/contact-us',array('as'=>'contact','uses'=>'Front@contact_us'));
Route::get('/login',array('as'=>'login','uses'=>'Front@login'));
Route::get('/logout',array('as'=>'logout','uses'=>'Front@logout'));
Route::get('/cart',array('as'=>'cart','uses'=>'Front@cart'));
Route::get('/cart',array('as'=>'cart','uses'=>'Front@cart'));
Route::get('/checkout',array('as'=>'checkout','uses'=>'Front@checkout'));
Route::get('/search/{query}',array('as'=>'search','uses'=>'Front@search'));
Route::get('blade',function(){
	$drinks=array('vodka','rum','beer');
	return view('page',array('name'=>'sri','day'=>'Friday','drinks'=>$drinks));
});
Route::get('/read', function() {
    $category = new App\Category();
    
    $data = $category->all(array('name','id'));

    foreach ($data as $list) {
        echo $list->id . ' ' . $list->name . '
';
    }
});*/