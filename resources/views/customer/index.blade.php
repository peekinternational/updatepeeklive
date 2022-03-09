@extends('customer.layout.app')
@section('title', 'Dashboard')
@section('content')
   <!-- content @s -->
                <div class="nk-content ">
                    <div class="container wide-xl">
                        <div class="nk-content-inner">
                         
                            <div class="nk-content-body">
                                <div class="nk-content-wrap">
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between-md g-4">
                                            <div class="nk-block-head-content">
                                                <h2 class="nk-block-title fw-normal">Welcome, {{Session::get('userInfo')->name}}</h2>
                                                <div class="nk-block-des">
                                                    <p>Welcome to our dashboard. Manage your account and your subscriptions.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                   
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->



@endsection
@section('script')


@endsection