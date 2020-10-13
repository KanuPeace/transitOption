<li class="clearfix">
    <div class="wi">
        <a href="{{ route('blog_info',['id'=>$r_post->id,'slug'=>$r_post->slug])}}">
            <img src="{{ asset('post_images/'.$r_post->image) }}" class="img-fluid" alt="Post image">
        </a>
    </div>
    <div class="wb"><a href="{{ route('blog_info',['id'=>$r_post->id,'slug'=>$r_post->slug])}}">
        {!! $r_post->title !!}</a><span class="post-date">{{ date('M d, Y',strtotime($r_post->created_at)) }}</span>
    </div>
</li>
