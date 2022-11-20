@extends('welcome')
@section('site-content')


        <div class="s-content">

            @foreach ($type_name as $type_name)
               
           <div class="title-pages" >
               {{$type_name->type_name}}
           </div>

           @endforeach 
            
            <div class="masonry-wrap">

                <div class="masonry">
    
                    <div class="grid-sizer"></div>
    
                    @foreach ($product as $item=>$blog)
                    <article class="masonry__brick entry format-standard animate-this">
                            
                        <div class="entry__thumb">
                            <a href="{{URL::to('/details-blog/'.$blog->product_id)}}" class="entry__thumb-link">
                                <img src="{{asset('public/images/uploads/'.$blog->product_images)}}" 
                                srcset="{{asset('public/images/uploads/'.$blog->product_images)}} , {{asset('images/uploads/'.$blog->product_images)}}" width="500"  alt="">
                            </a>
                        </div>
        
                        <div class="entry__text">

                            <div class="entry__header">
    
                                <h2 class="entry__title"><a href="{{URL::to('/details-blog/'.$blog->product_id)}}">{{$blog->product_name}}</a></h2>
                                <div class="entry__meta">
                                    <span class="entry__meta-cat">
                                        @foreach ($type as $item=>$type_pro)

                                        @if ($type_pro->type_id==$blog->type_id)
                                            
                                        <a href="{{URL::to('/type-full/'.$type_pro->type_id)}}">{{$blog->type_name}}</a> 

                                        @else
                                            
                                        @endif

                                            
                                        @endforeach

                                        @foreach ($author as $item=>$author_pro)
                                        @if ($author_pro->author_id==$blog->author_id)

                                        <a href="#">{{$blog->author_name}}</a>

                                        @else
                                        @endif
                                        @endforeach
                                    </span>
                                    {{-- <span class="entry__meta-date">
                                        <a href="single-standard.html">Apr 29, 2019</a>
                                    </span> --}}
                                </div>
                                
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                {{$blog->product_desc}}
                                </p>
                            </div>
                        </div>
                        
                    </article> <!-- end article -->
                    @endforeach
    
          
    
                </div> <!-- end masonry -->

            </div> <!-- end masonry-wrap -->

            <div class="row">
                <div class="column large-full">
                    <nav class="pgn">
                        {{-- <ul>
                            <li><a class="pgn__prev" href="#0">Prev</a></li>
                            <li><a class="pgn__num" href="#0">1</a></li>
                            <li><span class="">2</span></li>
                            <li><a class="pgn__num" href="#0">3</a></li>
                            <li><a class="pgn__num" href="#0">4</a></li>
                            <li><a class="pgn__num" href="#0">5</a></li>
                            <li><span class="pgn__num dots">…</span></li>
                            <li><a class="pgn__num" href="#0">8</a></li>
                            <li><a class="pgn__next" href="#0">Next</a></li>
                        </ul> --}}
                    </nav>
                </div>
            </div>

        </div> <!-- end s-content -->
  </section>
@endsection