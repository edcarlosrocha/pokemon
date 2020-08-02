@extends('layout')

@section('content')

@foreach($pokemons as $chunk)
	<div class="row">
		@foreach($chunk as $pokemon)
				<div class="pokemon col-md-2">
					<a href="javascript:void(0)" data-toggle="modal" data-target="#pokeModal" ng-click="getPokemon({{$pokemon['id']}})">
						<div class="pokemon-img">
							@if(file_exists(public_path() ."/img/pokemons/".$pokemon['id'].".png"))
								<img class="img-responsive" src="/img/pokemons/{{ $pokemon['id'] }}.png" width="100%">
							@else
								<img class="img-responsive img-not-found" src="/img/pokemons/sem-foto.png" width="100%">
							@endif
						</div>
						<div class="pokemon-name">{{ $pokemon['name'] }}</div>
					</a>
				</div>
		@endforeach
	</div>

	<div class="modal fade" id="pokeModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">@{{ pokemon.name }}</h5>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body table-responsive">
					<table class="table table-striped">
						<tr>
							<td width="50px">Base Experience</td>
							<td>@{{ pokemon.base_experience }}</td>
						</tr>

						<tr>
							<td>Types</td>
							<td>
								<span ng-repeat="type in pokemon.types">
									@{{ type.type.name }}<br>
								</span>
							</td>
						</tr>

						<tr>
							<td>Abilities</td>
							<td>
								<span ng-repeat="ability in pokemon.abilities">
									@{{ ability.ability.name }}<br>
								</span>
							</td>
						</tr>

					</table>
				</div>
			</div>
		</div>
	</div>
@endforeach

@stop