<?php $currency_code = getSetting('currency_code','site_settings');

//Latest Auctions
$latest_auctions = \App\Auction::getHomeLatestAuctions();
?>



<!--LATEST AUCTION DEALS SECTION-->
    <section class="au-latest">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 au-deals">
{{--               <p class="text-center">Dummy text of the printing industry</p>--}}
{{--                  <h2 class="text-center"> {{getPhrase('latest_auction_deals')}} </h2>--}}
                    <h2 class="text-center"> Últimas ofertas de subasta</h2>
                 </div>

                 @if (count($latest_auctions))

                    @foreach ($latest_auctions as $auction)
                    <style>

                    /* DEFAULT STYLE */
                    :root {
                      font-size: 16px;
                      --card-img-height: 200px;
                    }

                    .card-container {
                      width: 100%;
                      height: 100vh;
                      display: -webkit-box;
                      display: flex;
                      -webkit-box-orient: horizontal;
                      -webkit-box-direction: normal;
                              flex-flow: row wrap;
                      -webkit-box-pack: center;
                              justify-content: center;
                      -webkit-box-align: center;
                              align-items: center;
                      -webkit-transition: all 200ms ease-in-out;
                      transition: all 200ms ease-in-out;
                    }

                    .card {
                      align-self: flex-start;
                      position: relative;
                      width: 325px;
                      min-width: 275px;
                      margin: 1.25rem 0.75rem;
                      background: white;
                      -webkit-transition: all 300ms ease-in-out;
                      transition: all 300ms ease-in-out;
                    }
                    .card .card-img {
                      visibility: hidden;
                      width: 100%;
                      height: var(--card-img-height);
                      background-repeat: no-repeat;
                      background-position: center center;
                      background-size: cover;
                    }
                    .card .card-img-hovered {
                      --card-img-hovered-overlay: linear-gradient(
                        to bottom,
                        rgba(0, 0, 0, 0),
                        rgba(0, 0, 0, 0)
                      );
                      -webkit-transition: all 350ms ease-in-out;
                      transition: all 350ms ease-in-out;
                      background-repeat: no-repeat;
                      background-position: center center;
                      background-size: cover;
                      width: 100%;
                      position: absolute;
                      height: var(--card-img-height);
                      top: 0;
                    }
                    .card .card-info {
                      position: relative;
                      padding: 0.75rem 1.25rem;
                      -webkit-transition: all 200ms ease-in-out;
                      transition: all 200ms ease-in-out;
                    }
                    .card .card-info .card-about {
                      display: -webkit-box;
                      display: flex;
                      -webkit-box-pack: justify;
                              justify-content: space-between;
                      -webkit-box-align: center;
                              align-items: center;
                      padding: 0.75rem 0;
                      -webkit-transition: all 200ms ease-in-out;
                      transition: all 200ms ease-in-out;
                    }
                    .card .card-info .card-about .card-tag {
                      width: 60px;
                      max-width: 100px;
                      padding: 0.2rem 0.5rem;
                      font-size: 12px;
                      text-align: center;
                      text-transform: uppercase;
                      letter-spacing: 1px;
                      background: #505f79;
                      color: #fff;
                    }
                    .card .card-info .card-about .card-tag.tag-news {
                      background: #36b37e;
                    }
                    .card .card-info .card-about .card-tag.tag-deals {
                      background: #ffab00;
                    }
                    .card .card-info .card-about .card-tag.tag-politics {
                      width: 71px;
                      background: #ff5630;
                    }
                    .card .card-info .card-title {
                      z-index: 10;
                      font-size: 1.5rem;
                      padding-bottom: 0.75rem;
                      -webkit-transition: all 350ms ease-in-out;
                      transition: all 350ms ease-in-out;
                    }
                    .card .card-info .card-creator {
                      padding-bottom: 0.75rem;
                      -webkit-transition: all 250ms ease-in-out;
                      transition: all 250ms ease-in-out;
                    }
                    .card:hover {
                      cursor: pointer;
                      box-shadow: 0px 15px 35px rgba(227, 252, 239, 0.1), 0px 5px 15px rgba(0, 0, 0, 0.07);
                      -webkit-transform: scale(1.025);
                              transform: scale(1.025);
                    }
                    .card:hover .card-img-hovered {
                      --card-img-hovered-overlay: linear-gradient(
                        to bottom,
                        rgba(0, 0, 0, 0),
                        rgba(0, 0, 0, 0.65)
                      );
                      height: 100%;
                    }
                    .card:hover .card-about,
                    .card:hover .card-creator {
                      opacity: 0;
                    }
                    .card:hover .card-info {
                      background-color: transparent;
                    }
                    .card:hover .card-title {
                      color: #ebecf0;
                      -webkit-transform: translate(0, 40px);
                              transform: translate(0, 40px);
                    }

                    .card-{!! str_limit($auction->id) !!} .card-img,
                    .card-{!! str_limit($auction->id) !!} .card-img-hovered {
                      background-image:url({{getAuctionImage($auction->image,'auction')}});
                    }

                    </style>

                      <div class="card card-{!! str_limit($auction->id) !!}">
                        <div class="card-img"></div>
                        <a href="{{URL_HOME_AUCTION_DETAILS}}/{{$auction->slug}}" class="card-link">
                          <div class="card-img-hovered"></div>
                        </a>
                        <div class="card-info text-center">

                          <h1 class="card-title"><strong>{!! str_limit($auction->title,40,'..') !!}</strong></h1>
                            <div class="card-creator au-notification rounded">
                                <a class="text-white" href="{{URL_HOME_AUCTION_DETAILS}}/{{$auction->slug}}{{$auction->slug}}">{{$currency_code}} {{$auction->reserve_price}}</a>
                            </div>

                        </div>
                      </div>

                    @endforeach


                @else
                <div class="col-lg-12">
{{--                <h4> {{getPhrase('no_auctions_available')}} </h4>--}}
                    <h4 class="text-white">No hay subastas disponibles</h4>
            </div>
                @endif


            </div>
        </div>
    </section>
<!--LATEST AUCTION DEALS SECTION-->

