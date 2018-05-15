@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">

                <div class="card-header">Gérer les types de fournisseur</div>

                <div class="card-body col-md-6 offset-md-3">
                    <table class="table table-striped table-bordered">
                        <thead class="font-weight-bold">
                            <tr>
                                <th>Types de fournisseur</th>
                            </tr>
                        </thead>


                            <tbody>
                                @foreach($typeFournisseurs as $typeFournisseur)
                                <tr>
                                    <td>{{ $typeFournisseur->nom }}</td>
                                    <td class="col-md-2 text-center"><a href="{{ route('deleteTypeFournisseur',['id'=>$typeFournisseur->id]) }}"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>


                    </table>
                </div>

                <form action="{{ url('/typefournisseur/create') }}">
                    <div class="card-body row mb-0">
                        <div class="col-md-6 offset-md-5">
                            <input type="submit" class="btn btn-primary" value="Ajouter" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
