@extends('admin.app-layout')

@section('content')


        <div class="card-header">
            <span class='admin-title'>Korisnici</span>
        </div>

        <div class="card-body row">    
            <div class="col-xl-3" >
                <aside>
                    <div class="card">
                        <div class="card-header">
                            <h6>STATUS</h6>
                        </div>
                            <div class="card-body">
                                <ul class="sidebar-list">
                                    <a href="/admin/users/0"><li class="sidebar-item {{ !$role ? 'font-weight-bold' : ''}}">Svi</li></a>
                                    <a href="/admin/users/admin"><li class="sidebar-item {{ $role == 'admin' ? 'font-weight-bold' : ''}}">Admini</li></a>
                                    <a href="/admin/users/publisher"><li class="sidebar-item {{ $role == 'publisher' ? 'font-weight-bold' : ''}}">Radnici</li></a>
                                    <a href="/admin/users/customer"><li class="sidebar-item {{ $role == 'customer' ? 'font-weight-bold' : ''}}">Mušterije</li></a>
                                </ul>                
                            </div>
                    </div> 
                </aside>
            </div>

            <div class="col-xl-9">    
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Ime</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Adresa</th>
                        <th>Grad</th>
                        <th>Registrovan</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            <select class="select-role" id="{{$user->id}}" >
                                <option {{ $user->role == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                                <option {{ $user->role == 'publisher' ? 'selected' : '' }} value="publisher">Radnik</option>
                                <option {{ $user->role == 'customer' ? 'selected' : '' }} value="customer">Musterija</option>
                            </select>
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{formatDate($user->created_at)}}</td>
                        <td>
                            {{-- <form action="/user/status/{{$user->id}}" method="POST">
                                @csrf
                                <select onchange="this.form.submit()" name="status" class="form-control">
                                    <option {{$user->status == 1 ? 'selected' : ''}} value="1">Primljena</option>
                                    <option {{$user->status == 2 ? 'selected' : ''}} value="2">Poslata</option>
                                    <option {{$user->status == 3 ? 'selected' : ''}} value="3">Isporučena</option>
                                </select>
                                <button>OK</button>
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>        {{-- col-sm-10  --}}

            <div class="d-flex justify-content-center mb-3">
                {{$users->appends(request()->input())->links()}}
            </div>

        </div>         {{-- Card body  --}}

@endsection

