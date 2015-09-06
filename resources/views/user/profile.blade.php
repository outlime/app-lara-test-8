@extends('home')

@section('content')
<div>
	<header>
	  <div class='logo'>Pastiche</div>
	  <div class='nav'>
	    <a>Home</a>
	    <a>Discover</a>
	    <a>MyXoToD</a>
	  </div>
	</header>
	<div class='header-spacer'></div>
	<div class='header'>
	  <div class='header-wrapper'>
	    <div class='info'>
	      <div class='avatar'></div>
	      <div class='details'>
	        <div class='username'>{{ Auth::user()->name }}</div>
	        <div class='bio'><a href="#">Add Bio</a></div>
	        <div class='location entypo-location'><a href="#">Add Location</a></div>
	      </div>
	    </div>
	    <div class='stats'>
	      <div class='one'>
	        0 Followers
	      </div>
	      <div class='two'>
	        0 Following
	      </div>
	      <div class='three'>
	        0 Projects
	      </div>
	    </div>
	  </div>
	</div>
	<div class='content-wrapper'>
	  <article>
	    <h2>
	      Lorem Ipsum
	      <span></span>
	    </h2>
	    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In architecto porro totam tempore autem optio fuga recusandae neque possimus eveniet vel, impedit unde, doloribus amet ipsam rem ex obcaecati officiis.</p>
	  </article>
	</div>
</div>
@stop