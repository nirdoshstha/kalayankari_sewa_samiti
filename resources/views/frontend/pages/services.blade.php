@extends('frontend.layouts.master')

@section('title') {{$data['service']->title ?? ''}}@endsection 

@section('seo_keyword'){{$data['service']->seo_keyword ?? ''}}@endsection 

@section('seo_description'){{$data['service']->seo_description ?? ''}}@endsection

@push('css') 
   <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
@endpush

@section('content')
       
@include('frontend.design.'.$data['service']?->design ?? 'default')


{{-- @switch($data['service']?->design)
    @case('long')
        @include('frontend.design.long')
        @break
    @case('about')
        @include('frontend.design.about')   
        @break
    @case('contact')
        @include('frontend.design.contact')   
        @break
    @case('blog')
        @include('frontend.design.blog')   
        @break
    @case('blog-details')
        @include('frontend.design.blog-details')   
        @break
    @case('grid-2')
        @include('frontend.design.grid-2')   
        @break
    @case('team')
        @include('frontend.design.team')   
        @break
    @case('testimonial')
        @include('frontend.design.testimonial')   
        @break
    @case('product-details')
        @include('frontend.design.product-details')   
        @break
    @default
        @include('frontend.design.default')
        
@endswitch --}}

{{-- @if($data['service']?->design =='long')
    @include('frontend.design.long')

    @elseif($data['service']?->design =='about')
        @include('frontend.design.about')  

    @elseif($data['service']?->design =='contact')
        @include('frontend.design.contact')

    @elseif($data['service']?->design =='blog')
        @include('frontend.design.blog')

    @elseif($data['service']?->design =='blog-details')
    @include('frontend.design.blog-details')  

    @elseif($data['service']?->design =='grid')
    @include('frontend.design.grid')

    @elseif($data['service']?->design =='grid-2')
    @include('frontend.design.grid-2')

    @elseif($data['service']?->design =='team')
    @include('frontend.design.team')

    @elseif($data['service']?->design =='testimonial')
    @include('frontend.design.testimonial')

    @elseif($data['service']?->design =='product-details')
    @include('frontend.design.product-details')

 @else @include('frontend.design.default')

@endif  --}}

@endsection

@push('js') 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/assets/js/general.js') }}"></script>
@endpush

