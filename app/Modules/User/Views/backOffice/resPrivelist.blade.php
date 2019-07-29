<?php
/**
 * Created by PhpStorm.
 * User: ghdj9
 * Date: 7/27/2019
 * Time: 1:17 AM
 */
?>

@extends('backOffice.layout')

@section('head')
    @include('backOffice.inc.head',
    ['title' => 'Olympiade',
    'description' => 'Espace Administratif - Olympiade'
    ])
@endsection

@section('header')
    @include('backOffice.inc.header')
@endsection

@section('sidebar')
    @include('backOffice.inc.sidebar', [
        'current' => 'users'
    ])
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/15.0.1/css/intlTelInput.css"/>
    <style>
        .dataTables_length {
            float:left;
        }
        .image-upload>input {
            display: none;
        }
        .user_image_table
        {
            width: 100px;
            height: 100px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins') }}/datatable/datatable.css">
    <script type="text/javascript" src="{{ asset('plugins') }}/datatable/datatable.js"></script>

    <script type="text/javascript">

        /* Datatables responsive */

        $(document).ready(function () {
            /* $('#datatable-responsive').DataTable({
                 responsive: true,
                 language: {
                     url: "{{ asset('plugins') }}/datatable/lang/french.json"
                }
            });*/
            $('#datatable-sportifs').DataTable({

                responsive: true,
                initComplete: function(){
                    $("div.breadcrumb")
                        .append('<button type="button" class="add_user btn btn-primary m-1" data-role=4 id="sprotif">Ajouter</button>');
                },
                language: {
                    url: "{{ asset('plugins') }}/datatable/lang/french.json"
                }
            });
            $('.dataTables_filter input').attr("placeholder", "Rechercher...");
        });

    </script>


    <div class="breadcrumb">
        <h1>Responsables Complexes Privés</h1> <ul>
            <li><a href="">Tableau de bord</a></li>
            <li><a href="">Utilistauers</a></li>
            <li><a href="">Responsables Complexes Privés</a></li>
        </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">

        <div class="col-md-12 mb-4">
            <div class="card text-left">

                <div class="card-body">

                    <table id="datatable-sportifs"
                           class="display table table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        @foreach($privateOfficials as $privateOfficial)
                            <tr>
                                <td>{{$privateOfficial->first_name}}</td>
                                <td>{{$privateOfficial->last_name}}</td>
                                <td>{{$privateOfficial->email}}</td>
                                <td>{{$privateOfficial->phone}}</td>
                                <td>{{\Carbon\Carbon::parse($privateOfficial->created_at)->format('d-m-Y')}}</td>
                                <td>
                                    <a href="{{route('handleDeleteUser',$privateOfficial->id)}}"><span class="badge badge-pill badge-outline-dark p-2 m-1"><i class="i-Remove"></i></span></a>
                                    <a href="#" class="edit_user " get-user-url="{{route('handleGetUserById',$privateOfficial->id)}}"> <span class="badge badge-pill badge-outline-success p-2 m-1"><i class="i-Edit"></i></span></a>
                                </td>
                            </tr>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>

                    </table>

                </div>


            </div>
        </div>

    </div>
    <div class="modal fade" id="add_user_modal" tabindex="-1" role="dialog" aria-labelledby="add_user" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verifyModalContent_title">Ajouter un <span class="role_to_add"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="add_user_form" action="{{route('handleAddUser')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="recipient-name-2" class="col-form-label">Nom:</label>
                                    <input type="text" name="first_name" required class="form-control" id="recipient-name-2">
                                </div>

                            </div>

                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="recipient-name-2" class="col-form-label">Pénom:</label>
                                    <input type="text" name="last_name" required class="form-control" id="recipient-name-2">
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message-text-1" class="col-form-label">Numéro de telephone:</label>
                            <input type="text"  name="phone" class="form-control" id="recipient-name-2">
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <label class="radio radio-primary">
                                    <input type="radio" name="gender" checked value="1" formcontrolname="radio">
                                    <span>Homme</span>
                                    <span class="checkmark"></span>
                                </label>

                            </div>

                            <div class="col-md-6 col-xs-12">
                                <label class="radio radio-primary">
                                    <input type="radio" name="gender" value="2" formcontrolname="radio">
                                    <span>Femme</span>
                                    <span class="checkmark"></span>
                                </label>

                            </div>


                        </div>

                        <div class="form-group">
                            <label for="message-text-1" class="col-form-label">Email:</label>
                            <input type="email" required name="email" class="form-control" id="recipient-name-2">
                        </div>

                        <div class="form-group">
                            <label for="message-text-1" class="col-form-label">Mot de passe:</label>
                            <input type="password" required name="password" class="form-control" id="recipient-name-2">
                        </div>

                        <input type="hidden" id="selected_role" value="1" name="role" />
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" id="submit_add_user_form" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="edit_user" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verifyModalContent_title">Modifier utilisateur</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" id="edit_user_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <center> <div class="image-upload avatar  mb-3" >
                                <label for="file-input">
                                    <img id="image_to_edit"  style="border-radius: 50%;cursor:pointer;width: 100px;height: 100px;" />
                                </label>

                                <input id="file-input" name="picture" onchange="loadImage(this)" type="file" />
                            </div></center>


                        <div class="row">

                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="recipient-name-2" class="col-form-label">Nom:</label>
                                    <input type="text"  name="first_name" required class="form-control" id="first_name_to_edit">
                                </div>

                            </div>

                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="recipient-name-2" class="col-form-label">Pénom:</label>
                                    <input type="text" name="last_name" required class="form-control" id="last_name_to_edit">
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message-text-1" class="col-form-label">Numéro de telephone:</label>
                            <input type="text"  name="phone" class="form-control" id="phone_to_edit">
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <label class="radio radio-primary">
                                    <input type="radio" name="gender" id="male_gender" class="gender_to_edit" checked value="1" formcontrolname="radio">
                                    <span>Homme</span>
                                    <span class="checkmark"></span>
                                </label>

                            </div>

                            <div class="col-md-6 col-xs-12">
                                <label class="radio radio-primary">
                                    <input type="radio" name="gender" id="female_gender" class="gender_to_edit" value="2" formcontrolname="radio">
                                    <span>Femme</span>
                                    <span class="checkmark"></span>
                                </label>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message-text-1" class="col-form-label">Email:</label>
                            <input type="email" required name="email" class="form-control" id="email_to_edit">
                        </div>

                        <div class="form-group">
                            <label for="message-text-1" class="col-form-label">Mot de passe:</label>
                            <input type="password"  name="password"  class="form-control" id="recipient-name-2">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" id="submit_edit_user_form" class="btn btn-primary">Modifier</button>
                </div>
            </div>
        </div>
    </div>

    <script>


        $(document).on("click",".add_user",function()
        {
            $(".role_to_add").text($(this).attr("id"));
            $("#selected_role").val($(this).attr("data-role"));
            $("#add_user_modal").modal();
        })

        $(document).on("click",".edit_user",function()
        {

            $.ajax({
                type: "GET",
                url: $(this).attr("get-user-url"),
                dataType:"json",
                success: function(response){

                    //  console.log("Response : " +response));
                    console.log("response : "+response.user.email);
                    $("#email_to_edit").val(response.user.email);
                    $("#first_name_to_edit").val(response.user.first_name);
                    $("#last_name_to_edit").val(response.user.last_name);
                    $("#phone_to_edit").val(response.user.phone);
                    $("#image_to_edit").attr("src",response.user_image);
                    (response.user.gender==1) ? $("#male_gender").attr("checked","checked"): $("#female_gender").attr("checked","checked")

                    $("#edit_user_form").attr("action",response.edit_url)
                    $("#edit_user_modal").modal();
                },
                error:function(error)
                {
                    console.log("Erreur : "+error);
                }
            });
        });
        $("#submit_add_user_form").click(function()
        {
            $("#add_user_form").submit();
        });

        $("#submit_edit_user_form").click(function()
        {
            $("#edit_user_form").submit();
        })

        function loadImage(input){
            var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_to_edit').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
            else
            {
                console.log("Erreur photo");
            }
        }

    </script>
@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection