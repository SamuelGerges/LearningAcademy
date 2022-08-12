@extends('front.layout')
@section('content')
<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5>{{ json_decode($banner_content->content)->title }}</h5>
                        <h1>{{ json_decode($banner_content->content)->sub_title }}</h1>
                        <p>{{ json_decode($banner_content->content)->desc }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- feature_part start-->
<section class="feature_part">
    <div class="container">
        <div class="row  mb-5">
            <div class="col-sm-6 col-xl-3 align-self-center">
                <div class="single_feature_text ">
                    <h2>{{json_decode($awesome_Feature_content->content)->title}}</h2>
                    <p>{{json_decode($awesome_Feature_content->content)->desc}}</p>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><i class="ti-layers"></i></span>
                        <h2>{{json_decode($better_content->content)->title}}</h2>
                        <p>{{ json_decode($better_content->content)->desc}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><i class="ti-new-window"></i></span>
                        <h2>{{json_decode($trainers_content->content)->title}}</h2>
                        <p>{{json_decode($trainers_content->content)->desc}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="single_feature">
                    <div class="single_feature_part single_feature_part_2">
                        <span class="single_service_icon style_icon"><i class="ti-light-bulb"></i></span>
                        <h2>{{json_decode($job_content->content)->title}}</h2>
                        <p>{{json_decode($job_content->content)->desc}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- upcoming_event part start-->

<!-- member_counter counter start -->
<section class="member_counter">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter">{{$courses_count}}</span>
                    <h5 style="font-size:large;color: white">Courses</h5>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter">{{$trainers_count}}</span>
                    <h5 style="font-size:large;color: white">Trainers</h5>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter">{{$students_count}}</span>
                    <h5 style="font-size:large;color: white">Students</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- member_counter counter end -->

<!--::review_part start::-->
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p> {{json_decode($courses_content->content)->title}}</p>
                    <h2>{{json_decode($courses_content->content)->sub_title }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($courses as $course)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="{{asset('uploads/courses/'.$course->image)}}" class="special_img" alt="">
                        <div class="special_cource_text">
                            <a href="{{route('front.course.category',$course->category->id)}}" class="btn_4">{{ $course->category->name }}</a>
                            <h4>{{$course->price }}$</h4>
                            <a href="{{route('front.show.course',[$course->category->id,$course->id])}}"><h3>{{ $course->name }}</h3></a>
                            <p>{{ $course->small_desc }}</p>
                            <div class="author_info">
                                <div class="author_img">
                                    <img src="{{asset('uploads/trainers/'.$course->trainer->image)}}" alt="">
                                    <div class="author_info_text">
                                        <p>Conduct by:</p>
                                        <h5>{{$course->trainer->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--::blog_part end::-->

<!--::review_part start::-->
<section class="testimonial_part padding_top pb-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p> {{json_decode($testimonial_content->content)->title}}</p>
                    <h2>{{json_decode($testimonial_content->content)->sub_title }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="textimonial_iner owl-carousel">
                    @foreach($tests as $test)
                    <div class="testimonial_slider">
                        <div class="row">
                            <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                <div class="testimonial_slider_text">
                                    <p>{{ $test->description }}</p>
                                    <h4>{{ $test->name }}</h4>
                                    <h5>{{ $test->spec }}</h5>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-2 col-sm-4">
                                <div class="testimonial_slider_img">
                                    <img src="{{asset('uploads/tests/'.$test->image)}}" alt="#">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
<!--::blog_part end::-->

@endsection
