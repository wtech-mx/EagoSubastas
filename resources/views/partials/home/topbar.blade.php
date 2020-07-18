<?php

//Auction Categories
$categories = \App\Category::getHomeCategories(6);


?>

<style>
@media (min-width: 1200px){
.container {
    max-width: 100%;
}
}
</style>

<section class="au-navbar">
        <div class="container" >
            <div class="row">
                <div class="sf-contener clearfix col-lg-12" id="block_top_menu" >
                    <nav class="navbar navbar-expand-lg" style="background-color: transparent">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars au-icon"></i></span>
                      </button>
                             <a class="navbar-brand" href="{{PREFIX}}">
                              <img class="img-fluid" src="{{IMAGE_PATH_SETTINGS.getSetting('site_logo', 'site_settings')}}" alt="Auction Logo">
                            </a>

                      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">


                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 sf-menu">

{{--                                <li><a href="{{URL_HOME}}"> {{getPhrase('home')}} </a></li>--}}
                                <li><a href="{{URL_HOME}}"> Inicio </a></li>

{{--                                <li><a href="{{URL_HOME_AUCTIONS}}"> {{getPhrase('auctions')}} </a></li>--}}
                                <li><a href="{{URL_HOME_AUCTIONS}}"> Subastas </a></li>
                                @if ($categories)
                                @foreach ($categories as $category)

                                <?php $sub_categories = $category->get_sub_catgories()->get();?>

                                @if (count($sub_categories))
                                <li class="single-dropdown"><span class="menu-mobile-grover au-listts"><i class="fa fa-chevron-circle-down au-icon"></i></span>


{{--                                    <a href="javascript:void(0)"> {{$category->category}} </a>--}}
                                    <a href="javascript:void(0)"> {{$category->category}} </a>

                                    <ul class="submenu-container clearfix first-in-line-xs menu-mobile">
                                        <li>
                                            <ul>
                                    @foreach ($sub_categories as $sub)

                                    <?php $auctions_count = $sub->getMenuSubCategoryAuctions()->count();?>

                                        <li>
                                            <a href="javascript:void(0)" onclick="window.location.href='{{URL_HOME_AUCTIONS}}?category={{$category->slug}}&subcategory={{$sub->slug}}';"> {{$sub->sub_category}} ({{$auctions_count}}) </a>
                                        </li>
                                    @endforeach
                                            </ul>
                                        </li>
                                        <li id="category-thumbnails"></li>
                                    </ul>
                                </li>
                                @else

                                    <li><a href="javascript:void(0)" onclick="window.location.href='{{URL_HOME_AUCTIONS}}?category={{$category->slug}}';"> {{$category->category}} </a></li>
                                    @endif

                                    @endforeach
                                    @endif

{{--                                    <li><a href="{{URL_LIVE_AUCTIONS}}"> {{getPhrase('live_auctions')}} </a></li>--}}
                                        <li><a href="{{URL_LIVE_AUCTIONS}}"> Subastas en Vivo </a></li>

                                       @if (Auth::check())
                                       @include('bidder.common.notifications')
                                       @endif

                                       <li class="nav-item au-items">
{{--                                           <a  href="{{URL_CONTACT_US}}" title="Contact Us"> {{getPhrase('contact_us')}} </a>--}}
                                                <a  href="{{URL_CONTACT_US}}" title="Contact Us"> Contactanos</a>
                                       </li>

                                       @if (Auth::check())
                                       <li>
{{--                                           <a href="{{URL_DASHBOARD}}" title="Dashboard" > {{getPhrase('dashboard')}} </a>--}}
                                               <a href="{{URL_DASHBOARD}}" title="Dashboard" > Panel Cotrol</a>

                                       </li>
                                       @endif


                                       @if (!Auth::check())
                                       <li>
{{--                                           <a href="javascript:void(0);" onclick="showModal('loginModal')" title="Login" >{{getPhrase('login')}}</a>--}}
                                                <a href="javascript:void(0);" onclick="showModal('loginModal')" title="Login" >Login</a>
                                       </li>
                                       @endif
                            </ul>

                      </div>
                    </nav>
                </div>
            </div>
        </div>
</section>

     <aside class="js-offcanvas" data-offcanvas-options='{ "modifiers": "left,overlay" }' id="off-canvas"></aside>

    @if (isset($breadcrumb))
     <!--BREADCRUMBS SECTION-->
    <section class="au-bread-crumbs">
      <div class="container">
         <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-6 col-xs-6 au-crumbs">
                <h5>{{isset($title) ? $title : ''}}</h5>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 au-bread">
                <a href="javascript:void(0);" class="justify-content-end">{{getPhrase('home')}} &nbsp; <span> / {{isset($title) ? $title : ''}} </span></a>
            </div>
         </div>
      </div>
    </section>
    <!--BREADCRUMBS SECTION-->
    @endif
