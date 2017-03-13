<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Restaurant | main page</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('/css/main.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
        </div> -->
        <div class="header">
          <ul class="menu">
            <li class="menu-item"><a href="#"><img src="/images/logo.png" width='48' height='48' alt=""><span class="logo-name">Champs</span></a></li>
            <li class="menu-item active"><a href="#">Home</a></li>
            <li class="menu-item"><a href="#">About</a></li>
            <li class="menu-item"><a href="#">Team</a></li>
            <li class="menu-item"><a href="#">Menu</a></li>
            <li class="menu-item"><a href="#">Reservation</a></li>
            <li class="menu-item"><a href="#">Contact</a></li>
            <li class="menu-item"><a href="{{url('login')}}">Log In</a></li>
          </ul>
          <div class="header-text">
            <h1>MAKING DELICIOUS PREMIUM FOOD</h1>
            <p>Welcome to our restaurant! If you want to make a reservation, please, push the button below. Enjoy your meal! </p>
            <div class="button"><a href="#">BOOK A TABLE</a></div>
          </div>
        </div>
        <section class="introduce">
          <div class="col-sm-6">
            <img src="/images/introduce.png" alt="" class="image-responsive">
          </div>
          <div class="col-sm-6">
            <h1 class="introduce-header">INTRODUCE</h1>
            <h3 class="introduce-subheader">COLLEGE OF ART UNDER THE GUIDANCE OF FOOD.</h3>
            <p>Champs is a restaurant, bar and coffee roastery located on a busy corner site in Farringdon’s Exmouth Market. With glazed frontage on two sides of the building. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.
              There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </section>
        <section class="todays-special">
          <h3 class="todays-special-subheader">TODAY'S SPECIAL</h3>
          <h1 class="todays-special-header">FRESH AND DELICIOUS</h1>
          <div class="col-sm-5">
            <hr style="float:right;"/>
          </div>
          <div class="col-sm-2">
            <img src="/images/todays_special_icon.png" alt="" class="icon">
          </div>
          <div class="col-sm-5">
            <hr style="float:left;"/>
          </div>
          <div class="col-sm-4">
            <img src="/images/todays_special_image_1.jpg" alt="" class="image-responsive">
            <div class="description">
              <span class="description-name">Beefsteak</span>
              <span class="description-price">$25.99</span>
            </div>
          </div>
          <div class="col-sm-4">
            <img src="/images/todays_special_image_2.jpg" alt="" class="image-responsive">
            <div class="description">
              <span class="description-name">Rocky Mountain oysters</span>
              <span class="description-price">$40.00</span>
            </div>
          </div>
          <div class="col-sm-4">
            <img src="/images/todays_special_image_3.jpg" alt="" class="image-responsive">
            <div class="description">
              <span class="description-name">Empal gentong </span>
              <span class="description-price">$34.99</span>
            </div>
          </div>
        </section>
        <section class="our-menu">
          <div class="our-menu-wrapper">
            <div class="our-menu-container">
              <div class="our-menu-header">
                <h3>OUR MENU</h3>
                <h1>HEALTHY & TASTY</h1>
              </div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-sm-3">
                          <img src="/images/menu_item_1.jpg" alt="" class="our-menu-image">
                        </div>
                        <div class="col-sm-9 our-menu-item">
                          <span class="our-menu-item-name">Beefsteak</span>
                          <span class="our-menu-item-price">$25.99</span>
                          <p class="our-menu-item-description">The best steak you have ever tried. The secret is in the sauce.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-sm-3">
                          <img src="/images/menu_item_2.jpg" alt="" class="our-menu-image">
                        </div>
                        <div class="col-sm-9 our-menu-item">
                          <span class="our-menu-item-name">Crispy Squid</span>
                          <span class="our-menu-item-price">$25.99</span>
                          <p class="our-menu-item-description">Another amazing sea meal. If you are passionate about mollusc, this dish is for you.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-sm-3">
                          <img src="/images/menu_item_3.jpg" alt="" class="our-menu-image">
                        </div>
                        <div class="col-sm-9 our-menu-item">
                          <span class="our-menu-item-name">Baked Crab Cheese</span>
                          <span class="our-menu-item-price">$25.99</span>
                          <p class="our-menu-item-description">Traditionally, baked crab cheese comes before dessert at the end of a large meal.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-sm-3">
                          <img src="/images/menu_item_4.jpg" alt="" class="our-menu-image">
                        </div>
                        <div class="col-sm-9 our-menu-item">
                          <span class="our-menu-item-name">Roasted Chicken</span>
                          <span class="our-menu-item-price">$69.00</span>
                          <p class="our-menu-item-description">f you want, we can roast or grill your chicken stake of any size.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-sm-3">
                          <img src="/images/menu_item_5.jpg" alt="" class="our-menu-image">
                        </div>
                        <div class="col-sm-9 our-menu-item">
                          <span class="our-menu-item-name">Foie Gras</span>
                          <span class="our-menu-item-price">$25.99</span>
                          <p class="our-menu-item-description">One of the most famous dishes, cooked by our chef with a secret ingredient.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-sm-3">
                          <img src="/images/menu_item_6.jpg" alt="" class="our-menu-image">
                        </div>
                        <div class="col-sm-9 our-menu-item">
                          <span class="our-menu-item-name">Caprese Salad</span>
                          <span class="our-menu-item-price">$25.99</span>
                          <p class="our-menu-item-description">Fantastic mixture of bacon, walnuts and other exotic compontents.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-sm-3">
                          <img src="/images/menu_item_7.jpg" alt="" class="our-menu-image">
                        </div>
                        <div class="col-sm-9 our-menu-item">
                          <span class="our-menu-item-name">Cheese Shrimp Roll</span>
                          <span class="our-menu-item-price">$25.99</span>
                          <p class="our-menu-item-description">Yes, shrimps in cheese are delicious. Just taste them and you will like it.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-sm-3">
                          <img src="/images/menu_item_8.jpg" alt="" class="our-menu-image">
                        </div>
                        <div class="col-sm-9 our-menu-item">
                          <span class="our-menu-item-name">Chicken Soup</span>
                          <span class="our-menu-item-price">$25.99</span>
                          <p class="our-menu-item-description">The best chicken soup ever, made with fresh water, vegetables and love.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="team">
          <h3 class="team-subheader">OUR TEAM</h3>
          <h1 class="team-header">BEST CHEFS IN KITCHEN</h1>
          <div class="col-sm-5">
            <hr style="float:right;"/>
          </div>
          <div class="col-sm-2">
            <img src="/images/todays_special_icon.png" alt="" class="icon">
          </div>
          <div class="col-sm-5">
            <hr style="float:left;"/>
          </div>
          <div class="col-sm-4">
            <img class="image-responsive" src="/images/team_1.jpg" alt="">
            <h3 class="team-item-name">Ben Sheridan</h3>
            <h4 class="team-item-title">Chief Cook</h4>
            <hr class="team-item-hr"/>
            <p class="team-item-description">Ben is a professional of the top level with many years of experience in food service industry. His kitchen works like a clock.</p>
          </div>
          <div class="col-sm-4">
            <img class="image-responsive" src="/images/team_2.jpg" alt="">
            <h3 class="team-item-name">Linda Ray</h3>
            <h4 class="team-item-title">Sous Chef</h4>
            <hr class="team-item-hr"/>
            <p class="team-item-description">Linda is not only a talented sous chef, she is a true handy lady with a lot of skills that she got in different restaurants all over the world.</p>
          </div>
          <div class="col-sm-4">
            <img class="image-responsive" src="/images/team_3.jpg" alt="">
            <h3 class="team-item-name">Brandon Hernandez</h3>
            <h4 class="team-item-title">Sous Chef</h4>
            <hr class="team-item-hr"/>
            <p class="team-item-description">Brandon is a master of cooking. His talent helps him to come up with new recipes for our menu, which you can see and taste in our restaurant.</p>
          </div>
        </section>
    </body>
</html>
