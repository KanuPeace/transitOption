<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\VehicleImage;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        $sliderImages = VehicleImage::whereHas("vehicle")->inRandomOrder()->limit(5)->get();
        return view('web.pages.index' , compact("sliderImages"));
    }

    public function aboutUs(){
        return view('web.pages.about_us');
    }

    public function contactUs(){
        return view('web.pages.contact_us');
    }

    public function portfolio(){
        return view('web.pages.our_portfolio');
    }


    public function read_file($file){
        return getFileFromPrivateStorage(readFileUrl("descrypt" , $file));
    }



    public function sendContact(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $this->validate($request, [
                'name'     =>  'required',
                'email'  =>  'required|email',
                'phone'  =>  'required',
                'subject'  =>  'required',
                'message' =>  'required'
            ]);

            $data = array(
                "name"      =>  $request->name,
                "email"   =>   $request->email,
                "phone"   =>   $request->phone,
                "subject"   =>   $request->subject,
                "bodyMessage"   =>   $request->message
            );

            $email = 'contact@wusobtech.com';

            // Send An Email
            Mail::to($email)->send(new ContactFormMail($data));

            toastr()->success('Mail Sent Successfully!.');
            return redirect()->back();
        }
    }

    public function services(){
        return view('web.pages.services');
    }


    public function our_blog(Request $request){
        $search_keywords = $request->keywords;
        $category_id = $request->category_id;
        // $categories = BlogCategory::orderby('title')->limit(5)->inRandomOrder()->get();
        // $recent_posts = Blog::orderby('created_at' , 'desc')->limit(5)->inRandomOrder()->get();
        // $builder = Blog::where('status' , 1)->orderBy('created_at' , 'desc');
        // if(empty($category_id)){
        //     $posts = $builder->where('title', 'like' , '%'.$search_keywords.'%')->paginate(20);
        // }
        // else{
        //     $posts = $builder->where('title', 'like' , '%'.$search_keywords.'%')
        //     ->where('post_category_id' , $category_id )->paginate(20);
        //     $category_id = BlogCategory::find($category_id);
        // }
        // return view('web.pages.blog' , compact('posts' , 'categories' , 'search_keywords' , 'recent_posts' ));
        return view('web.pages.blog');
    }


    public function blog_info($id){
        $post = Blog::findorfail($id);
        $post['social_links'] = $this->post_share_links($post);
        $categories = BlogCategory::orderby('title')->limit(5)->inRandomOrder()->get();
        $recent_posts = Blog::orderby('created_at' , 'desc')->limit(5)->inRandomOrder()->get();
        $comments = BlogComments::where('blog_id',$post->id)->where('status',1)->orderby('id','desc')->get();
        return view('web.pages.blog_info' , compact('post' , 'categories' , 'recent_posts', 'comments'));
    }



    public function blog_category_posts(Request $request , $id){
        $category = $this->PostCategory->find($id);
        if(!empty($category)){
            $request['category_id'] = $id;
            return $this->blogsView($request);
        }
    }



    public function blogsComment(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'nullable|string',
            'website' => 'nullable|string',
            'blog_id' => 'required|string',
            'comment' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'success'=> false ,
                'msg' => 'Comment could not be added!',
                'data' => null,
            ]);
        }
        else{
           $data = $validator->validated();
           $comment = BlogComments::create($data);
           return response()->json([
               'success'=> true ,
               'msg' => 'Comment added successfully!',
               'data' => [
                   'avatar' => $comment->getAvatar() ,
                   'name' => $comment->name,
                   'date' => date('d M Y h:i:A',strtotime($comment->created_at)),
                   'comment' => $comment->comment,
                ],
           ]);
        }
    }


    public function share_post($id)
    {
        $post = Post::findorfail($id);
        return view('web.pages.share',compact('post'));
    }

    public function make_comment(Request $request){
        //dd($request->all());
        $data = $request->validate([
            'blog_id' => 'required',
            'name' => 'required|string',
            'email' => 'required|string',
            'body' => 'required|string',
        ]);
        $data['status'] = 1;
        $comment = BlogComments::create($data);
        $comment['post_date'] = date('d/m/y',strtotime($comment->created_at));
        $comment['name'] = $comment->name;
        $comment['email'] = $comment->email;
        $comment['body'] = $comment->body;
       return response()->json($comment);
    }

    function post_share_links($post){
        $title = $post->title;
        $url = route('blog_info',['id'=>$post->id,'slug'=>$post->slug]);
        $message = $post->message;
        return [

            [
                'type' => 'Facebook',
                'label' => "Like",
                'logo' => "fa fa-facebook-f",
                'shareUrl' => "https://facebook.com/sharer/sharer.php?u=".$url."",
                'countUrl' => "https://graph.facebook.com/?id={url}",
                'shareIn'=> "_blank",
                'color' => '#3b5998',
            ],

            [
                'type' => 'Twitter',
                'label' => "Tweet",
                'logo' => "fa fa-twitter",
                'shareUrl' => "https://twitter.com/share?url=".$url."&text=".$title."&via=twitter&hashtags=wusobtech",
                'countUrl' => "",
                'shareIn'=> "_blank",
                'color' => '#3490F3',
            ],

            // [
            //     'type' => 'Instagram',
            //     'label'=> "Instagram",
            //     'logo'=> "fa fa-instagram",
            //     'shareUrl'=> "https://www.instagram.com/share?url=".$url."",
            //     'countUrl'=> "",
            //     'shareIn'=> "_blank",
            //     'color' => '#00aced',
            //  ],

            [
                'type' => 'LinkedIn',
                'label' => "Share",
                'logo' => "fa fa-linkedin",
                'shareUrl'  => "https://www.linkedin.com/shareArticle?mini=true&url=".$url."",
                'countUrl' => "https://www.linkedin.com/countserv/count/share?format=jsonp&url=".$url."&callback=?",
                'shareIn'=> "_blank",
                'color' => '#007bb6',
            ],

            [
                'type' => 'Whatsapp',
                'label' => "WhatsApp",
                'logo' => "fa fa-whatsapp",
                'shareUrl' => "whatsapp://send?text=".$url." ".$title."",
                'countUrl' => "",
                'shareIn'  => "self",
                'color' => 'green',
            ],

        ];
    }

    public function subscribe(Request $request){
        $data = $request->validate([
            'email' => 'required|email'
        ]);

        $check = Subscriber::where('email',$data['email'])->count();

        if($check > 0){
            return response()->json(['msg' => 'You already subscribed.Thanks!']);
        }
        Subscriber::create($data);
        Mail::to($data['email'])->send(new NewsLetter($data));
        return response()->json(['msg' => 'Subscribed successfully!']);
    }

    public function unsubscribe($email){
        $find_email = Subscriber::where('email',$email)->first();
        if(empty($find_email)){
            $msg = 'Sorry, your email wasn`t found on our list! ';
        }
       $find_email->delete();
       $msg = 'You have successfully unsubscribed from our mailing list!';
   }
}
