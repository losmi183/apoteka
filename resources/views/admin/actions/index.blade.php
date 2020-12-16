@extends('admin.app-layout')

@section('content')

    <div class="card ">
        <div class="card-header">
            <span class='admin-title mr-3'>Akcije</span>
            <a href="/actions/create" class="btn btn-secondary">Kreiraj Akciju</a>
        </div>
        <div class="card-body row">      
            <div class="col-12">
                <table class="table">                   
                    <tr>
                        <th>#</th>
                        <th>Naziv</th>
                        <th>Slug</th>
                        <th>popust</th>
                        <th>slika</th>
                        <th>kreirana</th>
                        <th>Aktivnost</th>
                        <th></th>
                    </tr>
                    @foreach ($actions as $action)
                    <tr>
                        <td>{{$action->id}}</td>
                        <td>{{$action->name}}</td>
                        <td>{{$action->slug}}</td>
                        <td>{{$action->discount}}</td>
                        <td>{{$action->image}}</td>
                        <td>{{formatDate($action->created_at)}}</td>
                        <td>{{formatActive($action->active)}}</td>
                        <td>
                            <form action="{{ route('actions.destroy', $action->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ route('actions.edit', $action->id) }}" class="btn btn-secondary">Izmeni</a>
                                <button class="btn btn-danger">Obriši</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>        

            <div class="col-12 mt-4 d-flex justify-content-center">{{ $actions->links() }}</div>
        </div>
        
    </div>

@endsection