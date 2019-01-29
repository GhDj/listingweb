@extends('frontOffice.layout')

@section('head')

  @include('frontOffice.inc.head', ['title' => 'Olympiade | Détails Club' ])



@endsection



@section('header')

  @include('frontOffice.inc.header')

@endsection
@section('content')

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
                                <h2>Messages </h2>
                                <div class="breadcrumbs"><a href="#">Accueil</a><a href="#">Profile</a><span>Messages</span></div>
                            </div>
                            <div class="row">
                              @include('User::frontOffice.inc.asideProfile')
                                <div class="col-md-9">
                                    <div class="dashboard-list-box fl-wrap">
                                        <div class="dashboard-header fl-wrap">
                                            <h3>Indox</h3>
                                        </div>
                                        <!-- dashboard-list end-->
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item">New</span>
                                                <div class="dashboard-message-avatar">
                                                    <img src="images/avatar/3.jpg" alt="">
                                                </div>
                                                <div class="dashboard-message-text">
                                                    <h4>Andy Smith - <span>27 December 2018</span></h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>
                                                    <span class="reply-mail clearfix">Reply : <a  class="dashboard-message-user-mail" href="mailto:yourmail@domain.com" target="_top">yourmail@domain.com</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->
                                        <!-- dashboard-list end-->
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item">New</span>
                                                <div class="dashboard-message-avatar">
                                                    <img src="images/avatar/avatar-bg.png" alt="">
                                                </div>
                                                <div class="dashboard-message-text">
                                                    <h4>Andy Smith - <span>27 December 2018</span></h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>
                                                    <span class="reply-mail clearfix">Reply : <a  class="dashboard-message-user-mail" href="mailto:yourmail@domain.com" target="_top">yourmail@domain.com</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->
                                        <!-- dashboard-list end-->
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <div class="dashboard-message-avatar">
                                                    <img src="images/avatar/2.jpg" alt="">
                                                </div>
                                                <div class="dashboard-message-text">
                                                    <h4>Andy Smith - <span>27 December 2018</span></h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>
                                                    <span class="reply-mail clearfix">Reply : <a  class="dashboard-message-user-mail" href="mailto:yourmail@domain.com" target="_top">yourmail@domain.com</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->
                                        <!-- dashboard-list end-->
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <div class="dashboard-message-avatar">
                                                    <img src="images/avatar/avatar-bg.png" alt="">
                                                </div>
                                                <div class="dashboard-message-text">
                                                    <h4>Andy Smith - <span>27 December 2018</span></h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>
                                                    <span class="reply-mail clearfix">Reply : <a  class="dashboard-message-user-mail" href="mailto:yourmail@domain.com" target="_top">yourmail@domain.com</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->
                                        <!-- dashboard-list end-->
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <div class="dashboard-message-avatar">
                                                    <img src="images/avatar/6.jpg" alt="">
                                                </div>
                                                <div class="dashboard-message-text">
                                                    <h4>Andy Smith - <span>27 December 2018</span></h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>
                                                    <span class="reply-mail clearfix">Reply : <a  class="dashboard-message-user-mail" href="mailto:yourmail@domain.com" target="_top">yourmail@domain.com</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->
                                    </div>
                                    <!-- pagination-->
                                    <div class="pagination">
                                        <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                        <a href="#">1</a>
                                        <a href="#" class="current-page">2</a>
                                        <a href="#">3</a>
                                        <a href="#">4</a>
                                        <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--profile-edit-wrap end -->
                    </div>
                    <!--container end -->
                </section>
                <!-- section end -->

            </div>
        </div>
        <!-- wrapper end -->

@endsection
@section('footer')

  @include('frontOffice.inc.footer')

@endsection
