@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="animated fadeIn">
    <!-- Widgets  -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-note2"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">{{count($articles)}}</span></div>
                                <div class="stat-heading">Jumlah Artikel</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <i class="pe-7s-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">{{count($users)}}</span></div>
                                <div class="stat-heading">Jumlah Pengguna</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  /Traffic -->
    <div class="clearfix"></div>
    <!-- Orders -->
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Pengguna</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Persona</th>
                                        <th>Interest</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @forelse ($users as $user)
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->fullname}}</td>
                                        <td>{{$user->age}}</td>
                                        <td>{{$user->gender}}</td>
                                        <td>{{$user->persona->name_persona}}</td>
                                        <td>
                                            <?php $myinterests = explode(',', $user->interest);?>
                                            <ul>
                                                @foreach ($myinterests as $interest)
                                                @foreach ($interests as $a)
                                                @if($a['id'] == $interest)
                                                {{$interests[$interest-1]['title']}}
                                                @endif
                                                @endforeach 
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td collspan="9" class="text-center p-5">
                                            Data tidak tersedia
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->
            
            {{-- <div class="col-xl-4">
                <div class="row">
                    <div class="col-lg-6 col-xl-12">
                        <div class="card br-0">
                            <div class="card-body">
                                <div class="chart-container ov-h">
                                    <div id="flotPie1" class="float-chart"></div>
                                </div>
                            </div>
                        </div><!-- /.card -->
                    </div>
                </div>
            </div> <!-- /.col-md-4 --> --}}
        </div>
    </div>
</div>

@endsection