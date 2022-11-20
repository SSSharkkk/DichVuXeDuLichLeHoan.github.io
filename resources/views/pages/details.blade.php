@extends('welcome')
@section('site-content')

        <!-- site content
        ================================================== -->
        <div class="s-content content">
    
                
           
            <main class="row content__page">
                
                <article class="column large-full entry format-standard">
                    @foreach ($details_product as $item=>$blog)
                    {{-- <div class="media-wrap entry__media">
                        <div class="entry__post-thumb">
                            <img src="{{asset('images/uploads/'.$blog->product_images)}}"   width="100" height="auto"
                                  sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                        </div>
                    </div> --}}
                    

                    <div class="content__page-header entry__header">
                        <h1 class="display-1 entry__title">
                          {{$blog->product_name}}
                        </h1>
                        <ul class="entry__header-meta">
                            @foreach ($author as $item=>$author)
                            @if ($author->author_id==$blog->author_id)
                                
                            <li class="author">By <a href="#0">{{$blog->author_name}}</a></li>
                            
                            @endif

                            @endforeach
                            {{-- <li class="date">April 30, 2019</li> --}}
                            <li class="cat-links">
                                 {{-- @foreach ($type as $item=>$type)  --}}
                                    
                                @if ($blog->type_id)
                                 <li href="#0">{{$blog->type_name}}</li>
                                @endif

                                {{-- @endforeach  --}}
                                
                            </li>
                        </ul>

                    </div> <!-- end entry__header -->

                    <div class="entry__content">
                        <p>{!!$blog->product_content!!}</p>


                        {{-- <p class="entry__tags">
                            <span>Post Tags</span>
        
                            <span class="entry__tag-list">
                                <a href="#0">orci</a>
                                <a href="#0">lectus</a>
                                <a href="#0">varius</a>
                                <a href="#0">turpis</a>
                            </span>
            
                        </p> --}}
                    </div> <!-- end entry content -->
                    @endforeach
                    {{-- <div class="entry__pagenav">
                        <div class="entry__nav">
                            <div class="entry__prev">
                                <a href="#0" rel="prev">
                                    <span>Previous Post</span>
                                    Tips on Minimalist Design 
                                </a>
                            </div>
                            <div class="entry__next">
                                <a href="#0" rel="next">
                                    <span>Next Post</span>
                                    Less Is More 
                                </a>
                            </div>
                        </div>
                    </div> <!-- end entry__pagenav --> --}}
                    
                    <div class="entry__related">
                        <h3 class="h2">Vụ Án Mới Cập Nhập : </h3>
                    @foreach ($new_blog as $item=>$blog)
                        
                    <ul class="related">
                        <li class="related__item">
                            <a href="{{URL::to('/details-blog/'.$blog->product_id)}}" class="related__link">
                                <img src="{{asset('public/images/uploads/'.$blog->product_images)}}"  alt="">
                            </a>
                            <h5 class="related__post-title">{{$blog->product_name}}</h5>
                        </li>
                    </ul>

                    @endforeach
                    </div> <!-- end entry related -->
                 
                   
                </article> <!-- end column large-full entry-->


                
 @endsection