@extends('layouts.admin')

@section('content')
 
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <h1>La lista delle tipologie</h1>    

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Tipo</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td>{{ $type->type }}</td>
                    <td>
                        <a href="{{ route('admin.types.show', $type->id) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-warning" href="{{ route('admin.types.edit', $type->id) }}">
                            <i class="fa-solid fa-square-pen"></i>
                        </a>
                        <form class="d-inline-block" method="POST" action="{{ route('admin.types.destroy', $type->id) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection