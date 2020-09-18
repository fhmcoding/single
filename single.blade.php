@extends('layouts.teacherv2')
@section('content')
<style type="text/css">
	input[type="file"]{
		display: none;
	} 
	
	label[for="file2"] {
        padding: 10px 10px; */
        border: 1px solid #a9a5a5;
        border-color: #a9a5a5;
        background-color: white;
        color: #948d8d;
        /* border-radius: 50%; */
        /* box-shadow: 0 4px 8px 0 rgb(0 0 0 / 28%); */
        border: 1px solid #525250;
        cursor: pointer;
        justify-content: center;
        display: flex;
        margin-top: -11px;
        position: relative;
        top: 3px;
	}
	label[for="file2"] :hover{
		background-color: #f5eeee;
	}

.time{
    font-size: .6rem !important;
    color: #b1acac;
}
.time svg{
	margin:	2px 5px;
	position: relative;
    top: -1px;
}
.frame{
    
}
.content_frame{
    margin:10px 0px;
    overflow:hidden;
    background:#fff;
}
.icone_head{
    
    background:#e74c3c;
    color:#fff;
    padding:5px;
    box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.08), 0 1px 20px 0 rgba(0, 0, 0, 0.07), 0px 1px 11px 0px rgba(0, 0, 0, 0.07);
    border-radius:5px;
    
}
.icone_head:hover{
    background:#f52611;
    color:#fff;
}
.icone_head_plus{
    background:#f39c12;
    color:#fff;
    padding:5px;
    box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.08), 0 1px 20px 0 rgba(0, 0, 0, 0.07), 0px 1px 11px 0px rgba(0, 0, 0, 0.07);
    border-radius:5px;
}
.icone_head_plus:hover{
    background:#f1c40f;
     color:#fff;
}
.fl_left{
    float:left;
    margin-top:-40px;
}
iframe{
    width:100% !important;
}
.image_post{
    width:100%;
}
</style>

<div class="container">
<div class="row layout-top-spacing">
    <div id="basic" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                 <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>  التفاصيل </h4>
                    </div>                 
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                       <span class="time"> 
                        <svg xmlns="http://www.w3.org/2000/svg" color="#b1acac" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>{{ $post->created_at->year}}-{{ $post->created_at->month}}-{{ $post->created_at->day}}</span>
                        <h4>{{$post->name}}</h4>
                        <span class="badge badge-success"style="background-color: #9ddc3d59;font-size:.8rem !important;color: #51a364;">{{$post->subject->name}}</span>
                        
                        @if($post->docunment == "null")
                            
                        @else
                        <div class="content_frame">
                            @if($post->type_docunment=="image")
                                <img src="{{url('/')}}/myApp/storage/app/public/{{$post->docunment }}" class="image_post">
                                
                                                     
                                <a href="{{ route("getfile")}}" onclick="event.preventDefault();
                                                     document.getElementById('dowlonde-form').submit();" class="btn btn-info mb-2 btn-block btn-sm" style="margin:5px 0px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"  color="#fff"   stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> تحميل
                                </a>
                                <form id="dowlonde-form" action="{{ route('getfile') }}" method="post" style="display: none;">
                                <input hidden="filename" name="filename" value="{{$post->docunment }}">
                                            {{ csrf_field() }}
                                </form>
                            @endif
                            @if($post->type_docunment=="pdf")
                                <iframe src="{{url('/')}}/myApp/storage/app/public/{{$post->docunment}}" style="width:100%; height:400px;" frameborder="0"></iframe>
                                 <a href="{{ route("getfile")}}" onclick="event.preventDefault();
                                                     document.getElementById('dowlonde-form').submit();" class="btn btn-info mb-2 btn-block btn-sm" style="margin:5px 0px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"  color="#fff"   stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> تحميل
                                </a>
                                <form id="dowlonde-form" action="{{ route('getfile') }}" method="post" style="display: none;">
                                <input hidden="filename" name="filename" value="{{$post->docunment }}">
                                            {{ csrf_field() }}
                                </form>
                            @endif
                            @if($post->type_docunment=="video")
                             <video autoplay="" loop="" controls="" width="100%" height="480">
                                <source type="video/mp4" src="{{url('/')}}/myApp/storage/app/public/{{$post->docunment}}">
                            </video>
                             <a href="{{ route("getfile")}}" onclick="event.preventDefault();
                                                     document.getElementById('dowlonde-form').submit();" class="btn btn-info mb-2 btn-block btn-sm" style="margin:5px 0px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"  color="#fff"   stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> تحميل
                                </a>
                                <form id="dowlonde-form" action="{{ route('getfile') }}" method="post" style="display: none;">
                                <input hidden="filename" name="filename" value="{{$post->docunment }}">
                                            {{ csrf_field() }}
                                </form>
                            @endif
                        </div>
                        @endif
                        @if($post->frame != null)
                        <h5>فيديو من يوتيوب</h5>
                        <div class="frame">
                           <iframe width="560" height="315" src="{{$post->frame}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        @endif
                        @if($post->description != null)
                        <h5>ملاحظات</h5>
                        <p>
                           {{$post->description}}
                        </p>
                        @endif
                        @if($post->link!=null)
                            <h5>رابط خارجي</h5>
                            <a href="{{$post->link}}" class="btn btn-outline-primary btn-sm ">انقر هنا</a>
                        @endif
                </div>   
            </div>
        </div>
    </div>
</div>
</div>
<!--- result --->



@endsection
