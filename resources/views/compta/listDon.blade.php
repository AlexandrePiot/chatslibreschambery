@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">Liste des dons</div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <table class="table table-striped table-bordered">
                                    <thead class="font-weight-bold">
                                        <tr>
                                            <th>Liasse</th>
                                            <th>Emetteur</th>
                                            <th>Faite le</th>
                                            <th>Montant</th>
                                            <th>Recette</th>
                                            <th>Banque</th>
                                            <th>Chat concerné</th>
                                            <th>Reçu fiscal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dons as $don)
                                            <tr>
                                                <th>{{ $don->id_liasse }}</th>
                                                <td>{{ $don->nameSender }}</td>
                                                <td>{{ $don->dateDiscount }}</td>
                                                <td>{{ $don->priceDiscount }}€</td>
                                                <td>{{ $don->recipeType }}</td>
                                                <td>{{ $don->nameBank }}</td>
                                                <td>{{ $don->cat }}</td>
                                                <td>
                                                    @if($don->recu == 1)
                                                        Oui
                                                    @endif
                                                </td>
                                                <td class="text-center"><a href="{{ url('discount/edit/'.$don->id) }}" class="waves-effect"><i class="fa fa-edit"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection