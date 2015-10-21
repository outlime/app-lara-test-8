@extends('home')

@section('content')
    <div class="container">
            {{-- Quick post content --}}
            <div class="col-sm-9 col-md-9 col-lg-9 ">
                <div class="well text-center">
                    <h1>Inspire. Post something now.</h1>
                    <button type="button" class="btn btn-pastiche btn-post" data-toggle="modal" data-target="#createPostModal">Post</button>
                </div>
                {{-- Create a post modal --}}
                @include('partials.modals.createpost')

                {{-- News Feed Area --}}

                <div class="page-header">
                    <h1>News Feed <i class="fa fa-newspaper-o"></i></h1>
                    {{-- Cycle through posts from followed users --}}
                    @foreach ($posts as $post)
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                @include('partials.post')
                            </div>
                        </div>
                    @endforeach

                    @if (count(Auth::user()->following) == 0)
                        <h4>This place is too lonely! Follow somebody to populate your news feed.</h4>
                    @endif
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="dashboard-ads">
                    Promote your portfolio.<br>
                    <a href="mailto:pastichemaster@gmail.com">Contact Us</a>
                </div>
            </div>
    </div>
    
@stop