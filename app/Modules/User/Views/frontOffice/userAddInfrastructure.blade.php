@extends('frontOffice.layout')

@section('head')

    @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection

@section('css')

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.css">

@endsection


@section('header')
    @include('frontOffice.inc.header',['activatedLink'=>['home'=>'','contact'=>'','faq'=>'','profile'=>'act-link','associations' =>'','infrastructure'=>'']])

@endsection


@section('content')

    <style media="screen">
        .custom-form .filter-tags label {
            padding-left: 0px !important;
            margin-right: 1px;
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
                            <h2>Ajouter Infrastructure</h2>
                            <div class="breadcrumbs"><a href="#">Home</a><a
                                        href="#">Profile</a><span>Ajouter Infrastructure</span></div>
                        </div>
                        <div class="row">
                            @include('User::frontOffice.inc.asideProfile')
                            <div class="col-md-9">
                                <!-- profile-edit-container-->
                                <div class="profile-edit-container add-list-container">
                                    <div class="profile-edit-header fl-wrap">
                                        <h4>Informations</h4>
                                    </div>
                                    <div class="custom-form">
                                        <form class=""
                                              action="{{isset($infrastructure) ? route('handleEditInfrastructure') : route('handleAddInfrastructure')}}"
                                              method="post">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Acceuil <i class="fa fa-briefcase"></i></label>
                                                        <select name="reception" id="acceuil_choice" class="chosen-select">
                                                            <option value="1"> Oui</option>
                                                            <option selected value="0"> Non</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="display:none" id="choices_acceuil">
                                                    <div class="form-group ">
                                                        <label>Choix acceuil <i class="fa fa-briefcase"></i></label>
                                                        <select name="reception_choices[]" id="acceuil_multiple_choices" multiple class="chosen-select">
                                                            <option value="1"> Club</option>
                                                            <option value="2"> Salle de réuinion</option>
                                                            <option value="3"> Contrôle anti-dopage</option>
                                                            <option value="4"> Centre médio sportif</option>
                                                            <option value="5"> Infirmeri</option>
                                                            <option value="6"> Bureau</option>
                                                            <option value="7"> Réception</option>
                                                            <option value="8"> local rangement</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <label>Espace de restauration</label>
                                            <div class=" fl-wrap filter-tags">
                                                <select name="catering_space" class="chosen-select">
                                                    <option value="1">Oui</option>
                                                    <option value="0">Non</option>
                                                </select>
                                            </div>


                                            <!-- profile-edit-container end-->
                                            <!-- profile-edit-container-->
                                            <div class="profile-edit-container add-list-container">
                                                <div class="profile-edit-header fl-wrap">
                                                    <h4>Accès handicapé</h4>
                                                </div>
                                                <div class="custom-form">

                                                        <div class="col-md-4">
                                                            <label> <i class="fa fa-briefcase"></i></label>
                                                            <select name="handicap_access"  id="handicap_multiple_choices" multiple class="chosen-select ">
                                                                <option value="1"> Aire d'évolution</option>
                                                                <option value="2"> Tribune</option>
                                                                <option value="3"> Vestiaire </option>
                                                                <option value="4"> Sanitaire</option>

                                                            </select>
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="profile-edit-container add-list-container">
                                                <div class="profile-edit-header fl-wrap">
                                                    <h4>Tribune</h4>
                                                </div>
                                                <div class="col-md-4">

                                                    <div class="form-group ">
                                                        <label> Nombre Tribune <i class="fa fa-briefcase"></i></label>
                                                        <input type="number" class="form-control"
                                                               placeholder="nombre de tribune"
                                                               name="tribune_count"/>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group ">
                                                        <label> Nombre Tribune spectateur<i class="fa fa-briefcase"></i></label>
                                                        <input type="number" class="form-control"
                                                               placeholder="nombre de tribune"
                                                               name="spectator_tribune_count"/>
                                                    </div>

                                                </div>
                                            </div>

 <div class="profile-edit-container add-list-container">
                                                <div class="profile-edit-header fl-wrap">
                                                    <h4>Vestiaires</h4>
                                                </div>
                                                <div class="col-md-4">

                                                    <div class="form-group ">
                                                        <label> Nombre vestiaire joueurs <i class="fa fa-briefcase"></i></label>
                                                        <input type="number" class="form-control"
                                                               placeholder="nombre de vestiaire joueur"
                                                               name="cloakroom_player"/>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group ">
                                                        <label> Nombre vestiaire arbitres<i class="fa fa-briefcase"></i></label>
                                                        <input type="number" class="form-control"
                                                               placeholder="nombre de vestiaire arbitre"
                                                               name="cloakroom_referee"/>
                                                    </div>

                                                </div>
                                            </div>



 <div class="profile-edit-container add-list-container">
                                                <div class="profile-edit-header fl-wrap">
                                                    <h4>Sanitaire sportif</h4>
                                                </div>
                                                <div class="col-md-4">

                                                    <div class="form-group ">
                                                        <label> Nombre <i class="fa fa-briefcase"></i></label>
                                                        <input type="number" class="form-control"
                                                               placeholder="nombe de sanitaire sportif"
                                                               name="sports_sanitary"/>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="profile-edit-container add-list-container">
                                                <div class="profile-edit-header fl-wrap">
                                                    <h4>Parking</h4>
                                                </div>
                                                <div class="col-md-4">

                                                    <div class="form-group ">
                                                        <label> Nombre de place <i class="fa fa-briefcase"></i></label>
                                                        <input type="number" class="form-control"
                                                               placeholder="nombre de place"
                                                               name="parking_place"/>

                                                    </div>
                                                </div>
<div class="col-md-4">

                                                    <div class="form-group ">
                                                        <label> Nombre de place handicapé <i class="fa fa-briefcase"></i></label>
                                                        <input type="number" class="form-control"
                                                               placeholder="nombre de place handicapé"
                                                               name="handicap_parking_place"/>

                                                    </div>
                                                </div>

                                            </div>




                                                        <button class="btn  big-btn  color-bg flat-btn">Enregistrer<i
                                                                    class="fa fa-angle-right"></i></button>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--profile-edit-wrap end -->
                </div>
                <!--container end -->
            </section>

            <!-- section end -->
            <div class="limit-box fl-wrap"></div>
        </div>
    </div>
    <!-- wrapper end -->

@endsection
@section('footer')

    @include('frontOffice.inc.footer')

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.min.js"
            charset="utf-8"></script>

<script>
    $(document).ready(function()
    {
        $("#acceuil_choice").on("change",function () {
            if($(this).val()==1)

                $("#choices_acceuil").show();
                else
                    $("#choices_acceuil").hide();

        })

        $("#acceuil_multiple_choices").on("change",function () {
            var count = $('#acceuil_multiple_choices option:selected').length;

            if(count>2)
            {
                $(".custom_chosen_select_text").remove();
                $("#acceuil_multiple_choices").next().children().eq(0).hide();
                $("#acceuil_multiple_choices").next().first().append('<span class="multiple-options custom_chosen_select_text">Vous avez choisi '+count+'</span>')
            }
            else
            {
                $(".custom_chosen_select_text").remove();
                $("#acceuil_multiple_choices").next().children().eq(0).show();
            }
        })

        $("#handicap_multiple_choices").on("change",function () {
            var count = $('#handicap_multiple_choices option:selected').length;

            if(count>2)
            {

                $(".custom_chosen_select_text_handicap").remove();
                $("#handicap_multiple_choices").next().children().eq(0).hide();
                $("#handicap_multiple_choices").next().first().append('<span class="multiple-options custom_chosen_select_text_handicap">Vous avez choisi '+count+'</span>')
            }
            else
            {
                $(".custom_chosen_select_text_handicap").remove();
                $("#handicap_multiple_choices").next().children().eq(0).show();
            }
        })
    })
</script>
@endsection
