@extends('layouts.app', [
    'namePage' => 'Vote The Right Candidate',
    'class' => 'sidebar-mini',
    'activePage' => 'Vote',
])

@push('css')
<style>

@import url("https://fonts.googleapis.com/css?family=Montserrat");
@import url("https://fonts.googleapis.com/css?family=Open+Sans");
body, html {
  width: 100%;
  height: 100%;
  font-family: "Montserrat";
  color: #303633;
  background-color: #C8D9E7;
  overflow: hidden;
  font-size: 1em;
  font-style: normal;
  -webkit-appearance: none;
  outline: none;
  text-rendering: geometricPrecision;
  perspective: 1000px;
}

a {
  position: relative;
  display: inline-block;
  padding: 12px 35px;
  margin: 0 0 20px;
  background-color: #e1306c;
  color: white;
  border-radius: 5px;
  transition: all 0.3s;
  letter-spacing: 2px;
  font-size: 0.85em;
  font-weight: 700;
  text-decoration: none;
  text-transform: uppercase;
  box-shadow: 0 2px 30px rgba(225, 48, 108, 0.4);
}
a:hover {
  background-color: #e75d8c;
  text-decoration: none;
}

.content-wrapper {
  width: 300px;
  /* max-height: 530px; */
  border-radius: 5px;
  box-shadow: 0 2px 30px rgba(0, 0, 0, 0.2);
  background: #fbfcee;
  position: inherit;
  /*top: 50%;
  left: 50%; */
  /* transform: translate(-50%, 0%); */
  overflow-y: scroll;
  overflow-x: hidden;
  text-align: center;
}
.content-wrapper::-webkit-scrollbar {
  display: none;
}
.content-wrapper .img {
  width: 302px;
  height: 350px;
  position: relative;
  overflow: hidden;
}
.content-wrapper .img::after {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to top, rgba(88, 81, 219, 0.25), transparent);
}
.content-wrapper img {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  object-fit: contain;
}

.menu-bar-wrapper {
  position: absolute;
  bottom: 0;
  width: 100%;
  overflow: hidden;
}

.menu-bar,
.nav-bar {
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 100%;
  background-color: #5851db;
  transform: translateY(110%);
  transition: all 0.455s;
}
.menu-bar.active,
.nav-bar.active {
  transform: translateY(0%);
}
.menu-bar i,
.nav-bar i {
  color: rgba(250, 250, 254, 0.5);
  padding: 14px;
  transition: all 0.255s;
  cursor: pointer;
}
.menu-bar i.active,
.nav-bar i.active {
  color: white;
}
.menu-bar i:hover,
.nav-bar i:hover {
  color: white;
}

.nav-bar {
  background-color: #343436;
  transform: translateY(0%);
}
.nav-bar i {
  color: rgba(255, 255, 255, 0.35);
  padding: 14px;
  transition: all 0.255s;
  cursor: pointer;
}
.nav-bar i.active {
  color: white;
}
.nav-bar i:hover {
  color: #5851db;
}

.dots-wrapper {
  cursor: pointer;
  padding: 5px;
  height: 20px;
  position: absolute;
  right: 15px;
  top: 15px;
  z-index: 2;
}


.wave {
  opacity: 0.4;
  position: absolute;
  left: 50%;
  background: #bc2a8d;
  width: 500px;
  height: 500px;
  margin-left: -250px;
  margin-top: -50px;
  transform-origin: 50% 48%;
  border-radius: 43%;
  animation: drift 5000ms infinite linear;
}

.wave.-three {
  animation: drift 7000ms infinite linear;
  background: white;
  opacity: 1;
}

.wave.-two {
  animation: drift 9000ms infinite linear;
  opacity: 0.4;
  background: #ffdc80;
}

.profile--info {
  text-align: left;
}
.profile--info span {
  font-family: "Open Sans", "Adobe Blank";
  z-index: 1;
  left: 15px;
  top: 15px;
  font-size: 0.575em;
  color: rgba(84, 95, 89, 0.75);
  display: block;
}
.profile--info span.username {
  font-weight: 700;
  font-style: normal;
  font-size: 1.25em;
  color: black;
}
.profile--info span.userquote {
  margin-top: -15px;
  font-size: 0.85em;
  color: rgba(84, 95, 89, 0.75);
}

.user {
  background-color: white;
  width: 100%;
  margin-top: 0;
  max-height: 600px;
  position: relative;
  padding: 0 30px;
  box-sizing: border-box;
}

.user-social-wrapper {
  display: flex;
  justify-content: space-around;
  position: relative;
  margin: 20px 0;
  padding: 17px 0;
}
.user-social-wrapper::after, .user-social-wrapper::before {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  width: 100%;
  height: 1px;
  background-color: rgba(241, 193, 226, 0.5);
}
.user-social-wrapper::before {
  top: initial;
  bottom: 0;
}
.user-social-wrapper .user-info {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  font-weight: 200;
  flex: 1 1;
}
.user-social-wrapper .user-info span:first-child {
  font-size: 1.25em;
}
.user-social-wrapper .user-info span:last-child {
  font-size: 0.75em;
  color: rgba(84, 95, 89, 0.75);
}


@keyframes drift {
  from {
    transform: rotate(0deg);
  }
  from {
    transform: rotate(360deg);
  }
}


</style>
@endpush

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header ">
            Votes
          </div>
          <div class="card-body">

           <div class="row">

                <div class="col">

                    <div class="content-wrapper">
                        <div class="img"><img src="https://i.imgur.com/7Nwk67T.jpg"/></div>
                        <div class="wave -one"></div>
                        <div class="wave -two"></div>
                        <div class="wave -three"></div>
                        <div class="user">
                            <div class="profile--info"><span class="username">Gobie Nan </span><span>@gobienan</span><br/><span class="userquote">Developer & freelance web designer.</span></div>
                            <div class="user-social-wrapper">
                                <a href="#">Vote</a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col">

                    <div class="content-wrapper">
                        <div class="img"><img src="https://i.imgur.com/7Nwk67T.jpg"/></div>
                        <div class="wave -one"></div>
                        <div class="wave -two"></div>
                        <div class="wave -three"></div>
                        <div class="user">
                            <div class="profile--info"><span class="username">Gobie Nan </span><span>@gobienan</span><br/><span class="userquote">Developer & freelance web designer.</span></div>
                            <div class="user-social-wrapper">
                                <a href="#">Vote</a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col">

                    <div class="content-wrapper">
                        <div class="img"><img src="{{url('storage/picture/XEJpB3k8ybuxOhW8LMKImRJijsJNXpEI1r3leXuN.jpeg')}}"/></div>
                        <div class="wave -one"></div>
                        <div class="wave -two"></div>
                        <div class="wave -three"></div>
                        <div class="user">
                            <div class="profile--info"><span class="username">Gobie Nan </span><span>@gobienan</span><br/><span class="userquote">Developer & freelance web designer.</span></div>
                            <div class="user-social-wrapper">
                                <a href="#">Vote</a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col">

                    <div class="content-wrapper">
                        <div class="img"><img src="https://i.imgur.com/7Nwk67T.jpg"/></div>
                        <div class="wave -one"></div>
                        <div class="wave -two"></div>
                        <div class="wave -three"></div>
                        <div class="user">
                            <div class="profile--info"><span class="username">Gobie Nan </span><span>@gobienan</span><br/><span class="userquote">Developer & freelance web designer.</span></div>
                            <div class="user-social-wrapper">
                                <a href="#">Vote</a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
          // Javascript method's body can be found in assets/js/demos.js
          var scrollTop = 0;

            $(".content-wrapper").scroll(function () {
                if ($(this).scrollTop() > 300) {
                    $(".menu-bar-wrapper").css('bottom', -$(this).scrollTop());
                    return false;
                }
                $(".menu-bar-wrapper").css('bottom', -$(this).scrollTop());
                var st = jQuery(this).scrollTop();

                if (st > 20) {
                    if (st < scrollTop) {
                        jQuery(".menu-bar").addClass("active");
                    } else {
                        jQuery(".menu-bar").removeClass("active");
                    }
                    scrollTop = st;
                }

            });
        });
    </script>
@endpush
