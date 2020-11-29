<?php

use App\Helpers\AppConstants;
use App\Models\CourseReview;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\PlanSubscription;
use App\Models\Post;
use App\Models\User;
use App\Models\VehicleSeatStyle;
use App\Traits\Cart as TraitsCart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;

/** Return valid api response */
function problemResponse(string $message = null, int $status_code = null, Request $request = null, Exception $trace = null)
{
    $code = ($status_code != null) ? $status_code : '';
    $traceMsg = empty($trace) ?  null  : $trace->getMessage();
    $traceTrace = empty($trace) ?  null  : $trace->getTrace();

    $body = [
        'msg' => $message,
        'code' => $code,
        'success' => false,
        'error_debug' => empty($trace) ?  null  : $trace->getMessage()
    ];

    // if (!is_null($request)) {
    // 	save_log($request, $body);
    // 	if ($code == Constants::SERVER_ERR_CODE && !is_null($trace)) {
    // 		$message = 'URL : ' . $request->fullUrl() .
    // 			'<br /> METHOD: ' . $request->method() .
    // 			'<br /> DATA_PARAM: ' . json_encode($request->all()) .
    // 			'<br /> RESPONSE: ' . json_encode($body) .
    // 			'<br /> Trace Message: ' . $traceMsg .
    // 			'<br /> <b> Trace: ' . json_encode($traceTrace) . "</b>";

    // 		$logable = ['server_error' => $message];
    // 		Meta::newException($logable);
    // 	}
    // }

    return response()->json($body)->setStatusCode($code);
}

/** Return valid api response */
function validResponse(string $message = null, $data = null, $request = null)
{
    if (is_null($data) || empty($data)) {
        $data = null;
    }
    $body = [
        'msg' => $message,
        'data' => $data,
        'success' => true,
        'code' => 200,

    ];

    // if (!is_null($request)) {
    // 	save_log($request, $body);
    // }

    return response()->json($body);
}


/** Returns a random alphanumeric token or number
 * @param int length
 * @param bool  type
 * @return String token
 */
function getRandomToken($length, $typeInt = false)
{
    if ($typeInt) {
        $token = Str::substr(rand(1000000000, 9999999999), 0, $length) ;
    } else {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);
    
        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
    }
    return $token;
}

function generateNameCode($name)
{
    $splitName = explode(' ', $name);
    $code = '';
    foreach ($splitName as $name) {
        $code.= strtoupper($name[0]);
    }
    $code.= getRandomToken(5, true);
    return $code;
}

/**Puts file in a public storage */
function putFileInStorage($file, $path)
{
    $filename = uniqid().'.'.$file->getClientOriginalExtension();
    $file->storeAs($path, $filename);
    return $filename;
}

/**Puts file in a private storage */
function putFileInPrivateStorage($file, $path)
{
    $filename = uniqid().'.'.$file->getClientOriginalExtension();
    Storage::putFileAs($path, $file, $filename, 'private');
    return $filename;
}

function resizeImageandSave($image, $path, $disk = 'local', $width = 300, $height = 300)
{
    // create new image with transparent background color
    $background = Image::canvas($width, $height, '#ffffff');

    // read image file and resize it to 262x54
    $img = Image::make($image);
    //Resize image
    $img->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    });

    // insert resized image centered into background
    $background->insert($img, 'center');

    // save
    $filename = uniqid().'.'.$image->getClientOriginalExtension();
    $path = $path.'/'.$filename;
    Storage::disk($disk)->put($path, (string) $background->encode());
    return $filename;
}

// Returns full public path
function my_asset($path = null)
{
    return route('homepage').env('ASSET_URL').'/'.$path;
}


/**Gets file from public storage */
function getFileFromStorage($fullpath, $storage = 'public')
{
    if ($storage == 'storage') {
        return route('read_file', $fullpath);
    }
    return my_asset($fullpath);
}

/**Deletes file from public storage */
function deleteFileFromStorage($path)
{
    unlink(public_path($path));
}


/**Deletes file from private storage */
function deleteFileFromPrivateStorage($path)
{
    $exists = Storage::disk('local')->exists($path);
    if ($exists) {
        Storage::delete($path);
    }
}


/**Downloads file from private storage */
function downloadFileFromPrivateStorage($path, $name)
{
    $name = $name ?? env('APP_NAME');
    $exists = Storage::disk('local')->exists($path);
    if ($exists) {
        $type = Storage::mimeType($path);
        $ext = explode('.', $path)[1];
        $display_name = $name.'.'.$ext;
        // dd($display_name);
        $headers = [
            'Content-Type' => $type,
        ];

        return Storage::download($path, $display_name, $headers);
    }
    return null;
}

function readPrivateFile($path)
{
}


/**Reads file from private storage */
function getFileFromPrivateStorage($fullpath, $disk = 'local')
{
    if ($disk == 'public') {
        $disk = null;
    }
    $exists = Storage::disk($disk)->exists($fullpath);
    if ($exists) {
        $fileContents = Storage::disk($disk)->get($fullpath);
        $content = Storage::mimeType($fullpath);
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', $content);
        return $response;
    }
    return null;
}



function str_limit($string, $limit = 20, $end  = '...')
{
    return Str::limit(strip_tags($string), $limit, $end);
}



/**Returns file size */
function bytesToHuman($bytes)
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

    for ($i = 0; $bytes > 1024; $i++) {
        $bytes /= 1024;
    }

    return round($bytes, 2) . ' ' . $units[$i];
}


/** Returns File type
 * @return Image || Video || Document
 */
function getFileType(String $type)
{
    $imageTypes = imageMimes() ;
    if (strpos($imageTypes, $type) !== false) {
        return 'Image';
    }

    $videoTypes = videoMimes() ;
    if (strpos($videoTypes, $type) !== false) {
        return 'Video';
    }

    $docTypes = docMimes() ;
    if (strpos($docTypes, $type) !== false) {
        return 'Document';
    }
}

    function imageMimes()
    {
        return "image/jpeg,image/png,image/jpg,image/svg";
    }

    function videoMimes()
    {
        return "video/x-flv,video/mp4,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi";
    }

    function docMimes()
    {
        return "application/pdf,application/docx,application/doc";
    }


    function formatTime($minutes)
    {
        $seconds = $minutes * 60;
        $dtF = new DateTime("@0");
        $dtT = new DateTime("@$seconds");
        $a=$dtF->diff($dtT)->format('%a');
        $h=$dtF->diff($dtT)->format('%h');
        $i=$dtF->diff($dtT)->format('%i');
        $s=$dtF->diff($dtT)->format('%s');
        if ($a>0) {
            return $dtF->diff($dtT)->format('%a days, %h hrs, %i mins and %s secs');
        } elseif ($h>0) {
            return $dtF->diff($dtT)->format('%h hrs, %i mins ');
        } elseif ($i>0) {
            return $dtF->diff($dtT)->format(' %i mins');
        } else {
            return $dtF->diff($dtT)->format('%s seconds');
        }
    }

    /** Returns cart details
     * @return object
     */
    function getUserCart()
    {
        $user = auth('web')->user();

        $cart = Cart::where('user_id', $user->id)->first();
        if (empty($cart)) {
            $cart = Cart::create([
                'user_id' => $user->id,
                'price' => 0,
                'discount' => 0,
                'total' => 0,
                'quantity' => 0,
                'reference' => generateCartHash(),
            ]);
        }
        return $cart;
    }


    /** Refreshes cart details based on cart  items
     * @param int cart_id
     * @param bool generate_reference
     * @return cart object
     */
    function refreshCart($cart_id, $generate_reference = false)
    {
        $cart = Cart::find($cart_id);
        $items = CartItem::where('cart_id', $cart->id)->get();
        $price = 0;
        $discount = 0;
        $total = 0;
        $count = 0;
        foreach ($items as $item) {
            $count++;
            if (!empty($item->course_id)) {
                $price += $item->course->price;
                $discount += $item->course->discount;
                $total += $item->course->payableAmount();
            } else {
                $price += $item->plan->price;
                $discount += 0;
                $total += $item->plan->price;
            }
        }

        $cart->price = $price;
        $cart->discount = $discount;
        $cart->total = $total;
        $cart->quantity = $count;

        if ($generate_reference) {
            $cart->reference = generateCartHash();
        }
        $cart->save();

        session()->forget('my_courses');
        session()->forget('my_plans');

        return $cart;
    }

    function generateCartHash()
    {
        $token = getRandomToken(10);
        $check = Cart::where('reference', $token)->count();
        if ($check == 0) {
            return strtoupper($token);
        }
        return generateCartHash();
    }


    /** Checks if a course is in cart and returns item if found
     */
    function cartHasCourse($course_id)
    {
        return CartItem::where('cart_id', getUserCart()->id)->where('course_id', $course_id)->first();
    }

    function cartHasPlan($plan_id)
    {
        return CartItem::where('cart_id', getUserCart()->id)->where('plan_id', $plan_id)->first();
    }

    function userOrderedCourses($user_id)
    {
        $user = User::find($user_id);
        return $orderedCourses = OrderItem::where('user_id', $user->id)->whereHas('course')->whereHas('order', function ($query) {
            $query->where('status', 1);
        })->pluck('course_id');
    }


    function hasReviewedCourse($course_id, $user_id)
    {
        $count = CourseReview::where('user_id', $user_id)->where('course_id', $course_id)->count();
        if ($count < 1) {
            return false;
        }
        return true;
    }


    function getMyCourses()
    {
        $my_courses = [];
        if (auth('web')->check()) {
            if (session()->has('my_courses')) {
                $my_courses = session()->get('my_courses');
            } else {
                $my_courses = userOrderedCourses(auth('web')->id());
                session()->put('my_courses', $my_courses);
            }
        }
        return $my_courses;
    }

    function userActivePlans($user_id)
    {
        $user = User::find($user_id);
        return PlanSubscription::where('user_id', $user->id)
            ->whereHas('plan')
            ->whereDate('stop', '>=', Carbon::now())
            ->orWhere('stop', 'Lifetime')
            ->where('status', 1)
            ->pluck('plan_id');
    }

    function getMyActivePlans()
    {
        $my_plans = [];
        if (auth('web')->check()) {
            if (session()->has('my_plans')) {
                $my_plans = session()->get('my_plans');
            } else {
                $my_plans = userActivePlans(auth('web')->id());
                session()->put('my_plans', $my_plans);
            }
        }
        return $my_plans;
    }


    // function userHasCourse($course_id){
    //     if(empty($user)){
    //         return false;
    //     }

    //     if(in_array($course_id , $orderedCourses)){
    //         return true;
    //     }
    //     return false;
    // }


    /**Returns formatted money value
     * @param float amount
     * @param int places
     * @param string symbol
     */
    function format_money($amount, $places = 2, $symbol = '$')
    {
        return $symbol.''.number_format((float)$amount, $places);
    }


    function bloggerStats($blogger_id)
    {
        $posts = Post::where('user_id', $blogger_id)->get();
        $counts = 0;
        $likes = 0;
        $comments = 0;
        foreach ($posts as $post) {
            $counts++;
            $comments += $post->comments->count();
            $likes += $post->likes->count();
        }
        return [
            'likes' => $likes,
            'comments' => $comments,
            'posts' => $counts,
        ];
    }


    function getPlanDuration()
    {
        return [
            '1' => '1 Day',
            '3' => '3 Days',
            '7' => 'Week',
            '14' => '2 Weeks',
            '30' => 'Month',
            '60' => '2 Months',
            '90' => 'Quarter',
            '120' => '6 Months',
            '360' => 'Year',
            'Lifetime' => 'Lifetime',
        ];
    }


    function setActiveCourse($course_id)
    {
        session()->put('active_course_id', $course_id);
    }

    function getCourseRatingStats($course_id)
    {
        $ratings = CourseReview::where('course_id', $course_id)->get();
        $star5 = 0;
        $star4 = 0;
        $star3 = 0;
        $star2 = 0;
        $star1 = 0;
        $count = 0;
        $total = 0;
        foreach ($ratings as $rating) {
            $count++;
            $total+= $rating->stars;

            if ($rating->stars == 5) {
                $star5++;
            }
            if ($rating->stars == 4) {
                $star4++;
            }
            if ($rating->stars == 3) {
                $star3++;
            }
            if ($rating->stars == 2) {
                $star2++;
            }
            if ($rating->stars == 1) {
                $star1++;
            }
        }
        $perc5 = $star5 == 0 ? 0 : ($star5 * 100) / $count;
        $perc4 = $star4 == 0 ? 0 : ($star4 * 100) / $count;
        $perc3 = $star3 == 0 ? 0 : ($star3 * 100) / $count;
        $perc2 = $star2 == 0 ? 0 : ($star2 * 100) / $count;
        $perc1 = $star1 == 0 ? 0 : ($star1 * 100) / $count;
        $avg = $total == 0 ? 0 : $total / $count;

        return [
            'stars' => [
                'five' => [
                    'count' => $star5,
                    'percent' => $perc5,
                ],
                'four' => [
                    'count' => $star4,
                    'percent' => $perc4,
                ],
                'three' => [
                    'count' => $star3,
                    'percent' => $perc3,
                ],
                'two' => [
                    'count' => $star2,
                    'percent' => $perc2,
                ],
                'one' => [
                    'count' => $star1,
                    'percent' => $perc1,
                ],
            ],
            'avg' => number_format($avg, 1),
            'count' => number_format($count),
        ];
    }



    
    function getUserProfileStatuses($user = null, $current = false)
    {
        if (empty($user)) {
            $user = auth()->user();
        }

        $user_stats = [
            "user_profile" => [
                "key" => "user_profile",
                "current" => null,
                "status" => !empty($user->gender) &&
                            !empty($user->country_id) &&
                            !empty($user->state_id) &&
                            !empty($user->city_id) &&
                            // !empty($user->lga_id) &&
                            // !empty($user->address) &&
                            !empty($user->phone) ,
                "title" => "Complete Profile",
            ],

            "next_kin" => [
                "key" => "next_kin",
                "current" => null,
                "status" => !empty($user->kin),
                "title" => "Next of Kin",
            ],
        ];

        $company_stats = [
            "company_profile" => [
                "key" => "company_profile",
                "current" => null,
                "status" => !empty($user->company),
                "title" => "Company Profile",
            ],
        ];

        $default_stats = [
            "email" => [
                "key" => "email",
                "current" => null,
                "status" => !empty($user->email_verified_at),
                "title" => "Verify Email Address",
            ],
        ];

        $statuses = array_merge(
            $default_stats,
            $user->role ==  AppConstants::DEFAULT_USER_TYPE ? $user_stats : [],
            $user->role ==  AppConstants::COMPANY_USER_TYPE ? $company_stats : [],
        );


        if ($current) {
            foreach ($statuses as $key => $value) {
                if ($value["status"] == false) {
                    return $statuses[$key];
                }
            }
            $user->status = 1;
            $user->save();
            return true;
        }

        return $statuses;
    }

    /** Return current user comapny
     * @return Company object
     */
    function company()
    {
        return  auth()->user()->company;
    }


    function getVehicleColors($color = null){
        $colors = [
            1 => "White", 
            2 => "Black" , 
            3 => "Grey" , 
            4 => "Purple"
        ];
        if(!array_key_exists($color , $colors) ){
            $color = null;
        }
        return !empty($color) ? $colors[$color] : $colors;
    }

    
    function getVehicleConditions($condition = null){
        $conditions = [
            1 => "New",
            2 => "Fairly Used",
        ];
        if(!array_key_exists($condition , $conditions) ){
            $condition = null;
        }
        return !empty($condition) ? $conditions[$condition] : $conditions;
    }

    function getVehicleTypes($type = null){
        $types = [
            2 => "Bus",
            1 => "Car",
        ];
        if(!array_key_exists($type , $types) ){
            $type = null;
        }
        return !empty($type) ? $types[$type] : $types;
    }

    
    function getVehicleSeatNubers($number = null){
        $numbers = [
            1 => "4",
            2 => "5",
            3 => "6",
            4 => "7",
            5 => "8",
            6 => "10",
            7 => "12",
            8 => "15",
            9 => "20",
            10 => "30",
            11 => "40",
        ];
        if(!array_key_exists($number , $numbers) ){
            $number = null;
        }
        return !empty($number) ? $numbers[$number] : $numbers;
    }


    function companyVehicleSessionDataKey($type = "new"){
        return strtolower($type)."_vehicle_".company()->id;
    }

    function getSeatNumber(VehicleSeatStyle $vehicleSeatStyle){
        $all = $vehicleSeatStyle->width * $vehicleSeatStyle->length;
        $empty = !empty(trim($vehicleSeatStyle->empty_seats)) ? explode(",", $vehicleSeatStyle->empty_seats) : [] ;
        $countEmpty = count($empty);
         return $all - $countEmpty;
    }


    function logError(Exception $e){
        logger($e->getMessage() , $e->getTrace());
    }