@extends('home')

@section('content')
<div class="area"></div>
<nav class="main-menu">
    <ul>
        <li>
            <a href="#">
                <i class="fa fa-home fa-2x"></i>
                <span class="nav-text">
                    Dashboard
                </span>
            </a>
          
        </li>
        <li class="has-subnav">
            <a href="#">
                <i class="fa fa-briefcase fa-2x"></i>
                <span class="nav-text">
                    Projects
                </span>
            </a>
            
        </li>
        <li class="has-subnav">
            <a href="#">
               <i class="fa fa-envelope fa-2x"></i>
                <span class="nav-text">
                    Messages
                </span>
            </a>
            
        </li>
        <li class="has-subnav">
            <a href="#">
               <i class="fa fa-group fa-2x"></i>
                <span class="nav-text">
                    Followers
                </span>
            </a>
           
        </li>
        <li>
            <a href="#">
                <i class="fa fa-info fa-2x"></i>
                <span class="nav-text">
                    Profile
                </span>
            </a>
        </li>
    </ul>

    <ul class="logout">
        <li>
           <a href="/auth/logout">
                 <i class="fa fa-power-off fa-2x"></i>
                <span class="nav-text">
                    Logout
                </span>
            </a>
        </li>  
    </ul>
</nav>
@stop