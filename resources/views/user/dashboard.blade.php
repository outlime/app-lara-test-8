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
                    <div class="row">
                        @foreach ($posts as $post)
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    @include('partials.post')
                                </div>
                        @endforeach
                    </div>

                    @if (count(Auth::user()->following) == 0)
                        <h4>This place is too lonely! Follow some users to populate your news feed!</h4>
                        <form method="POST" action="search">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="input-group">
                                    <button class="btn btn-pastiche" type="submit">
                                        <i class="fa fa-search"></i> Search Users
                                    </button>
                                </span>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="dashboard-ads">
                    Promote your portfolio.<br>
                    <a href="mailto:support@pastichean.com">Contact Us</a>
                </div>
            </div>
    </div>
    
@stop