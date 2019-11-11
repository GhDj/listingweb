@extends('frontOffice.layout')

@section('head')

    @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection



@section('header')

    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'','faq'=>'','profile'=>'act-link','associations'=>'','infrastructure'=>'']])

@endsection
@section('content')
    <style>
        .dashboard-header h3 {
            color: black;
        }
    </style>
    <!-- wrapper -->
    <div id="wrapper">
        <!--content -->
        <div class="content">
            <!--section -->
            <section id="sec1">
                <!-- container -->
                <div class="container">
                    <!-- profile-edit-wrap -->
                    <div class="profile-edit-wrap">
                        <div class="profile-edit-page-header">
                            <h2>Espace utilisateur {{Auth::user()->roles->first()->title}}</h2>
                            <div class="breadcrumbs"><a href="{{route('showHome')}}">Accueil</a><span>Profile</span>
                            </div>
                        </div>
                        <div class="row">
                            @include('User::frontOffice.inc.asideProfile')
                            <div class="col-md-9">
                                <!-- profile-edit-container-->
                                <div class="profile-edit-container">
                                    <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                        <h4>Salut ,
                                            <span>{{Auth::user()->first_name}} {{Auth::user()->last_name}} </span></h4>
                                    </div>
                                    <!-- statistic-container-->
                                    <div class="statistic-container fl-wrap">
                                        <!-- statistic-item-wrap-->
                                    @if (checkPrivateComplexRole(Auth::user())||checkPublicComplexRole(Auth::user()))


                                        <!-- statistic-item-wrap end-->
                                            <!-- statistic-item-wrap-->

                                            <div class="statistic-item-wrap">
                                                <div class="statistic-item gradient-bg fl-wrap">


                                                    @if (checkPrivateComplexRole(Auth::user())||checkPublicComplexRole(Auth::user()))

                                                        @if(Auth::user()->complex)
                                                            <div class="statistic-item-numder">
                                                                {{ Auth::user()->complex->view_count }}
                                                            </div>
                                                            <h5>Visites</h5>
                                                        @else
                                                            <div class="statistic-item-numder">
                                                                0
                                                            </div>
                                                            <h5>Visites</h5>
                                                        @endif
                                                    @endif

                                                </div>
                                            </div>
                                        @endif

                                        <div class="statistic-item-wrap">
                                            <div class="statistic-item gradient-bg fl-wrap">
                                                @if (checkPrivateComplexRole(Auth::user())||checkPublicComplexRole(Auth::user()))

                                                @if(Auth::user()->complex)
                                                    <div class="statistic-item-numder">
                                                        {{ Auth::user()->complex->view_count }}
                                                    </div>
                                                    <h5>Visites</h5>
                                                @else
                                                        <div class="statistic-item-numder">
                                                            0
                                                        </div>
                                                        <h5>Visites</h5>
                                                @endif
                                                @endif

                                            </div>
                                        </div>


                                        <div class="statistic-item-wrap">
                                            <div class="statistic-item gradient-bg fl-wrap">

                                                @if (checkPrivateComplexRole(Auth::user())||checkPublicComplexRole(Auth::user()))
                                                @if(Auth::user()->complex)
                                                    <div class="statistic-item-numder">
                                                       @isset($reviewsCount)
                                                        {{$reviewsCount}}
                                                        @endisset

                                                    </div>
                                                    <h5>Notes</h5>
                                                @else
                                                    <h5>Aucune Note</h5>
                                                @endif
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="statistic-item-wrap">
                                            <div class="statistic-item gradient-bg fl-wrap">

                                                @if (checkPrivateComplexRole(Auth::user())||checkPublicComplexRole(Auth::user()))
                                                    @if(Auth::user()->complex)
                                                        <div class="statistic-item-numder">
                                                            @isset($reviewsCount)
                                                                {{$reviewsCount}}
                                                            @endisset

                                                        </div>
                                                        <h5>Commentaires</h5>
                                                    @else
                                                        <h5>Aucun Commentaire</h5>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <!-- statistic-item-wrap end-->


                                        <!-- statistic-item-wrap end-->
                                        <!-- statistic-item-wrap-->
                                        @if (checkAthleticRole(Auth::user()))
                                            <div class="statistic-item-wrap">
                                                <div class="statistic-item gradient-bg fl-wrap">
                                                    <i class="fa fa-comments-o"></i>
                                                    <div class="statistic-item-numder">{{Auth::user()->reviews->count()}}</div>
                                                    <h5>Total Commentaires</h5>
                                                </div>
                                            </div>
                                            <!-- statistic-item-wrap end-->
                                            <!-- statistic-item-wrap-->
                                            <div class="statistic-item-wrap">
                                                <div class="statistic-item gradient-bg fl-wrap">
                                                    <i class="fa fa-heart-o"></i>
                                                    <div class="statistic-item-numder">{{Auth::user()->wishlists->count()}}</div>
                                                    <h5>Aimé</h5>
                                                </div>
                                            </div>
                                    @endif
                                    <!-- statistic-item-wrap end-->
                                    </div>
                                    <!-- statistic-container end-->
                                </div>
                                <!-- profile-edit-container end-->

                                <div class="dashboard-list-box fl-wrap activities">
                                    <div class="dashboard-header fl-wrap" style="color:black;margin-bottom: 16px">

                                        @if(checkPublicComplexRole(Auth::user())&&(!Auth::user()->complex)&&(!userHasRequest(Auth::user())))

                                            <h3>Vous avez trouver votre complex public ? </h3>
                                        @else
                                            Activités Récentes</h3>
                                        @endif
                                    </div>

                                    <!-- dashboard-list end-->

                                    @if (checkAthleticRole(Auth::user()))
                                        @foreach (Auth::user()->wishlists()->orderby('created_at', 'asc')->get() as $wishlist)
                                            <div class="dashboard-list">
                                                <div class="dashboard-message">
                                                    <span id="terrain{{$wishlist->wished->id}}"
                                                          data-terrain="{{ $wishlist->wished->id }}" title="Supprimer?"
                                                          class="wichlist new-dashboard-item"><i
                                                                class="fa fa-times"></i></span>

                                                    <div class="dashboard-message-text">

                                                        @if ($wishlist->wished_type == "App\Modules\Complex\Models\Terrain")
                                                            <p><i class="fa fa-heart"></i>vous avez aimé <a
                                                                        href="{{route('showTerrainDetails',$wishlist->wished->id)}}">{{$wishlist->wished->name}}</a>
                                                                listing!</p>
                                                        @endif
                                                        @if ($wishlist->wished_type == "App\Modules\Complex\Models\Club")
                                                            <p><i class="fa fa-heart"></i>vous avez aimé <a
                                                                        href="{{route('showClubDetails',$wishlist->wished->id)}}">{{$wishlist->wished->name}}</a>
                                                                listing!</p>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    <!-- dashboard-list end-->
                                        <!-- dashboard-list end-->
                                        @foreach (Auth::user()->reviews()->orderby('created_at', 'asc')->get() as $review)
                                            <div class="dashboard-list">
                                                <div class="dashboard-message">
                                                        <span class="new-dashboard-item"><i
                                                                    class="fa fa-times"></i></span>

                                                    <div class="dashboard-message-text">
                                                        @if ($review->reviewed_type == "App\Modules\Complex\Models\Terrain")
                                                            <p><i class="fa fa-comments-o"></i> Vous Avez commenté
                                                                sur
                                                                <a href="{{route('showTerrainDetails',$review->reviewed->id)}}">{{$review->reviewed->name}}</a>
                                                            </p>
                                                        @endif
                                                        @if ($review->reviewed_type ==  "App\Modules\Complex\Models\Club")
                                                            <p><i class="fa fa-heart"></i>vous avez aimé <a
                                                                        href="{{route('showClubDetails',$review->reviewed->id)}}">{{$review->reviewed->name}}</a>
                                                                listing!</p>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if (checkPrivateComplexRole(Auth::user()) || checkPublicComplexRole(Auth::user()))
                                        @if(checkPublicComplexRole(Auth::user())&&(!Auth::user()->complex))

                                            <div class="col-md-12" style="margin-bottom: 16px">
                                                @if(!userHasRequest(Auth::user()))
                                                    @if(count($availableComplex)>0)
                                                        <form action="{{route('handleUserRequestComplex')}}"
                                                              style="display: flex;" class="header-search-select-item"
                                                              method="POST">
                                                            @csrf

                                                            {{--<select data-placeholder="Les complex public disponibles"
                                                                    name="complex" class="chosen-select">--}}
                                                                <select data-placeholder="Les complex public disponibles"
                                                                        name="complex">
                                                                @foreach($availableComplex as $complex)
                                                                    <option value="{{$complex->id}}">{{$complex->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="submit" class="header-search-button"
                                                                   value="Envoyer une demande d'accès"/>
                                                        </form>
                                                    @else
                                                        <p>Il n'y a aucun complex libre pour le moment veuillez nous
                                                            <a href="mailto:zied@olympiadesports.com">contacter</a> pour
                                                            plus d'information</p>
                                                    @endif
                                                @else

                                                    <p>Votre demande a été envoyé veuillez patienter la validation
                                                        de l'administration</p>

                                                @endif
                                            </div>
                                        @else


                                            @if(!empty($userTerrains))
                                                @foreach ($userTerrains as $terrain)
                                                    @if(Auth::user()->wishlists->count() > 0)
                                                        @foreach ($terrain->wishlists as $wishlist)

                                                        <div class="dashboard-list">
                                                            <div class="dashboard-message">
                                                                    <span class="new-dashboard-item"><i
                                                                                class="fa fa-times"></i></span>

                                                                <div class="dashboard-message-text">


                                                                    <p>
                                                                        <i class="fa fa-heart"></i>{{$wishlist->wisher->first_name}}
                                                                        a aimé <a
                                                                                href="{{route('showTerrainDetails',$wishlist->wished->id)}}">{{$wishlist->wished->name}}</a>
                                                                        listing!</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    <!-- dashboard-list end-->
                                        <!-- dashboard-list end-->
                                        @if(checkPublicComplexRole(Auth::user())&&(!Auth::user()->complex))
                                        @else
                                            @if(!empty($userTerrains))
                                                @foreach ($userTerrains as $terrain)
                                                @foreach ($terrain->reviews as $review)

                                                    <div class="dashboard-list">
                                                        <div class="dashboard-message">
                                                        <span class="new-dashboard-item"><i
                                                                    class="fa fa-times"></i></span>
                                                            <div class="dashboard-message-text">
                                                                <p>
                                                                    <i class="fa fa-comments-o"></i>{{$review->reviewer->first_name}}
                                                                    a Commenté <a
                                                                            href="{{route('showTerrainDetails',$review->reviewed->id)}}">{{$review->reviewed->name}}</a>
                                                                    listing!</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                            @endforeach
                                        @endforeach
                                            @endif
                                    @endif
                                @endif
                                <!-- dashboard-list end-->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--profile-edit-wrap end -->
                </div>
                <!--container end -->
            </section>
            <!-- section end -->
            <!--  section end -->
            <div class="limit-box fl-wrap"></div>
        </div>
    </div>

@endsection
@section('footer')

    @include('frontOffice.inc.footer')

@endsection

@section('scripts')
    <script>
        $('.wichlist').click(function (e) {
            e.preventDefault();
            var id = "";

            var terrainId = $(this).data('terrain');
            var clubId = $(this).data('club');

            if (terrainId != null) {
                id = terrainId;
                type = "terrain";

            }
            if (clubId) {
                id = clubId;
                type = "club";
            }

            var toRemove = $(this);

            $.get("{{ route('showHome')}}/userWichlist/" + type + "/" + id).done(function (res) {

                toRemove.parent().parent().remove();
                console.log("Res :" + JSON.stringify(res));


            });

        });
    </script>
@endsection
