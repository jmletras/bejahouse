@if($errors->count())
	<div class="alert alert-danger" role="alert">
		O imóvel não foi gravado porque existem campos mandatórios que não foram preenchidos. Confirme cada campo.
	</div>
@endif

@if(\Session::has('success'))
	<div class="alert alert-success" role="alert">
		{!! \Session::get('success') !!}
	</div>
@endif

<div class="row">
	<div style="margin-bottom: 5px;" class="col-md-6 ">
		<label class="control-label" for="tipo_negocio">Tipo de negócio*:</label>
		<select name="tipo_negocio" id="tipo_negocio" class="form-control">
				<option value="">Escolha o tipo de negócio</option>
				<option @if((isset($imovel) AND $imovel->tipo_negocio == 'Venda') OR (old('tipo_negocio') == 'Venda')) selected @endif value="Venda">Venda</option>
				<option @if((isset($imovel) AND $imovel->tipo_negocio == 'Arrendamento') OR (old('tipo_negocio') == 'Arrendamento')) selected @endif value="Arrendamento">Arrendamento</option>
		</select>
		@if ($errors->has('tipo_negocio')) <p class="text-danger help-block">{{ $errors->first('tipo_negocio') }}</p> @endif	
	</div>
	<div class="col-md-6">
		<label class="control-label" for="natureza">Natureza*:</label>
		<select name="natureza" id="natureza" class="form-control form-control-sm">
				<option value="">Escolha a natureza do imóvel</option>			
				<option @if((isset($imovel) AND $imovel->natureza == 'Apartamento') OR (old('natureza') == 'Apartamento')) selected @endif value="Apartamento">Apartamento</option>
				<option @if((isset($imovel) AND $imovel->natureza == 'Armazém') OR (old('natureza') == 'Armazém')) selected @endif value="Armazém">Armazém</option>
				<option @if((isset($imovel) AND $imovel->natureza == 'Escritório') OR (old('natureza') == 'Escritório')) selected @endif value="Escritório">Escritório</option>
				<option @if((isset($imovel) AND $imovel->natureza == 'Espaço comercial') OR (old('natureza') == 'Espaço comercial')) selected @endif value="Espaço comercial">Espaço comercial</option>
				<option @if((isset($imovel) AND $imovel->natureza == 'Garagem') OR (old('natureza') == 'Garagem')) selected @endif value="Garagem">Garagem</option>
				<option @if((isset($imovel) AND $imovel->natureza == 'Loja') OR (old('natureza') == 'Loja')) selected @endif value="Loja">Loja</option>
				<option @if((isset($imovel) AND $imovel->natureza == 'Moradia') OR (old('natureza') == 'Moradia')) selected @endif value="Moradia">Moradia</option>	
				<option @if((isset($imovel) AND $imovel->natureza == 'Prédio') OR (old('natureza') == 'Prédio')) selected @endif value="Prédio">Prédio</option>	
				<option @if((isset($imovel) AND $imovel->natureza == 'Propriedade agrícola') OR (old('natureza') == 'Propriedade agrícola')) selected @endif value="Propriedade agrícola">Propriedade agrícola</option>		
				<option @if((isset($imovel) AND $imovel->natureza == 'Quinta') OR (old('natureza') == 'Quinta')) selected @endif value="Quinta">Quinta</option>			
				<option @if((isset($imovel) AND $imovel->natureza == 'Terreno urbanizável') OR (old('natureza') == 'Terreno urbanizável')) selected @endif value="Terreno urbanizável">Terreno urbanizável</option>
		</select>
		@if ($errors->has('natureza')) <p class="text-danger help-block">{{ $errors->first('natureza') }}</p> @endif	
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<label class="control-label" for="tipologia">Tipologia:</label>
		<select name="tipologia" id="tipologia" class="form-control form-control-sm">
				<option value="">Escolha a tipologia do imóvel</option>
				<option @if((isset($imovel) AND $imovel->tipologia == 'T0') OR (old('tipologia') == 'T0')) selected @endif value="T0">T0</option>
				<option @if((isset($imovel) AND $imovel->tipologia == 'T1') OR (old('tipologia') == 'T1')) selected @endif value="T1">T1</option>
				<option @if((isset($imovel) AND $imovel->tipologia == 'T2') OR (old('tipologia') == 'T2')) selected @endif value="T2">T2</option>
				<option @if((isset($imovel) AND $imovel->tipologia == 'T3') OR (old('tipologia') == 'T3')) selected @endif value="T3">T3</option>
				<option @if((isset($imovel) AND $imovel->tipologia == 'T4') OR (old('tipologia') == 'T4')) selected @endif value="T4">T4</option>
				<option @if((isset($imovel) AND $imovel->tipologia == 'T5') OR (old('tipologia') == 'T5')) selected @endif value="T5">T5</option>
				<option @if((isset($imovel) AND $imovel->tipologia == 'T6') OR (old('tipologia') == 'T6')) selected @endif value="T6">T6</option>
		</select>
		@if ($errors->has('tipologia')) <p class="text-danger help-block">{{ $errors->first('tipologia') }}</p> @endif
	</div>
	<div class="col-md-6">
		<label class="control-label" for="estado">Estado*:</label>
		<select name="estado" id="estado" class="form-control form-control-sm">
				<option value="">Escolha o estado do imóvel</option>
				<option @if((isset($imovel) AND $imovel->estado == 'Novo') OR (old('estado') == 'Novo')) selected @endif value="Novo">Novo</option>
				<option @if((isset($imovel) AND $imovel->estado == 'Usado') OR (old('estado') == 'Usado')) selected @endif value="Usado">Usado</option>
		</select>
		@if ($errors->has('estado')) <p class="text-danger help-block">{{ $errors->first('estado') }}</p> @endif
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<label class="control-label" for="area_util">Área útil*:</label>
		<input type="text" name="area_util" class="form-control" value="@if(isset($imovel)){{$imovel->area_util}}@endif"/>
		@if ($errors->has('area_util')) <p class="text-danger help-block">{{ $errors->first('area_util') }}</p> @endif
	</div>
	<div class="col-md-4">
		<label class="control-label" for="area_bruta">Área bruta*:</label>
		<input type="text" name="area_bruta" class="form-control" value="@if(isset($imovel)){{$imovel->area_bruta}}@endif"/>
		@if ($errors->has('area_bruta')) <p class="text-danger help-block">{{ $errors->first('area_bruta') }}</p> @endif	
	</div>
	<div class="col-md-4">
		<label class="control-label" for="area_terreno">Área terreno:</label>
		<input type="text" name="area_terreno" class="form-control" value="@if(isset($imovel)){{$imovel->area_terreno}}@endif"/>
		@if ($errors->has('area_terreno')) <p class="text-danger help-block">{{ $errors->first('area_terreno') }}</p> @endif
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<label class="control-label" for="localidade">Distrito*:</label>		
		<select name="distrito" class="form-control form-control-sm">
			<option value=""> </option>
			@foreach ($distritos as $key => $value)
				<option @if((isset($imovel) AND $imovel->distrito == $value) OR (old('distrito') == $value)) selected @endif value="{{ $value }}">{{ $key }}</option>
			@endforeach
		</select>
		@if ($errors->has('distrito')) <p class="text-danger help-block">{{ $errors->first('distrito') }}</p> @endif
	</div>
	<div class="col-md-6">
	<label class="control-label" for="localidade">Concelho*:</label>		
		<select name="concelho" class="form-control form-control-sm">
			<option value="">Escolha o distrito</option>
			@foreach ($concelhos as $concelho)
				<option @if((isset($imovel) AND $imovel->concelho == $concelho->id) OR (old('concelho') == $concelho->id)) selected @endif value="{{ $concelho->id }}">{{ $concelho->nome_concelho }}</option>
			@endforeach		
		</select>
		@if ($errors->has('concelho')) <p class="text-danger help-block">{{ $errors->first('concelho') }}</p> @endif
	</div>
	
</div>

<div class="row">
	<div class="col-md-6">
		<label class="control-label" for="codigo_postal">Código Postal:</label>
		<input type="text" name="codigo_postal" class="form-control" value="@if(isset($imovel)){{$imovel->codigo_postal}}@endif" />
		@if ($errors->has('codigo_postal')) <p class="text-danger help-block">{{ $errors->first('codigo_postal') }}</p> @endif	
	</div>
	<div class="col-md-6">
		<label class="control-label" for="localidade">Localidade*:</label>		
		<select name="localidade" class="form-control form-control-sm">
			<option value="">Escolha o concelho</option>
			@foreach ($localidades as $localidade)
				<option @if((isset($imovel) AND $imovel->localidade == $localidade->id) OR (old('localidade') == $localidade->id)) selected @endif value="{{ $localidade->id }}">{{ $localidade->nome_localidade }}</option>
			@endforeach
		</select>
		@if ($errors->has('localidade')) <p class="text-danger help-block">{{ $errors->first('localidade') }}</p> @endif	
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<label class="control-label" for="rua">Rua:</label>
		<input type="text" name="rua" class="form-control" value="@if(isset($imovel)){{$imovel->rua}}@endif"/>
		@if ($errors->has('rua')) <p class="text-danger help-block">{{ $errors->first('rua') }}</p> @endif	
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<label class="control-label" for="ano_construcao">Ano construção:</label>
		<input type="text" name="ano_construcao" class="form-control" value="@if(isset($imovel)){{$imovel->ano_construcao}}@endif"/>
		@if ($errors->has('ano_construcao')) <p class="text-danger help-block">{{ $errors->first('ano_construcao') }}</p> @endif
	</div>
	<div class="col-md-6">
		<label class="control-label" for="categoria_energetica">Categoria energética:</label>
		<select name="categoria_energetica" id="categoria_energetica" class="form-control form-control-sm">
				<option value="">Escolha a categoria energética do imóvel</option>
				<option @if((isset($imovel) AND $imovel->categoria_energetica == 'A') OR (old('categoria_energetica') == 'A')) selected @endif value="A">A</option>
				<option @if((isset($imovel) AND $imovel->categoria_energetica == 'B') OR (old('categoria_energetica') == 'B')) selected @endif value="B">B</option>
				<option @if((isset($imovel) AND $imovel->categoria_energetica == 'C') OR (old('categoria_energetica') == 'C')) selected @endif value="C">C</option>
				<option @if((isset($imovel) AND $imovel->categoria_energetica == 'D') OR (old('categoria_energetica') == 'D')) selected @endif value="D">D</option>
				<option @if((isset($imovel) AND $imovel->categoria_energetica == 'E') OR (old('categoria_energetica') == 'E')) selected @endif value="E">E</option>
				<option @if((isset($imovel) AND $imovel->categoria_energetica == 'F') OR (old('categoria_energetica') == 'F')) selected @endif value="F">F</option>
				<option @if((isset($imovel) AND $imovel->categoria_energetica == 'Em Processo') OR (old('categoria_energetica') == 'Em Processo')) selected @endif value="Em Processo">Em Processo</option>
		</select>
		@if ($errors->has('categoria_energetica')) <p class="text-danger help-block">{{ $errors->first('categoria_energetica') }}</p> @endif
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<label class="control-label" for="wc">Casas de banho:</label>
		<input type="text" name="wc" class="form-control" value="@if(isset($imovel)){{$imovel->wc}}@endif"/>
		@if ($errors->has('wc')) <p class="text-danger help-block">{{ $errors->first('wc') }}</p> @endif	
	</div>
	<div class="col-md-4">
		<label class="control-label" for="wc">Quartos:</label>
		<input type="text" name="quartos" class="form-control" value="@if(isset($imovel)){{$imovel->quartos}}@endif"/>
		@if ($errors->has('quartos')) <p class="text-danger help-block">{{ $errors->first('quartos') }}</p> @endif
	</div>
	<div class="col-md-4">
		<label class="control-label" for="garagem">Garagem:</label>
		<select name="garagem" id="garagem" class="form-control form-control-sm">
			<option value=''></option>
			<option @if((isset($imovel) AND $imovel->garagem == '1') OR (old('garagem') == '1')) selected @endif value="1">Sim</option>
			<option @if((isset($imovel) AND $imovel->garagem == '0') OR (old('garagem') == '0')) selected @endif value="0">Não</option>
		</select>
		@if ($errors->has('garagem')) <p class="text-danger help-block">{{ $errors->first('garagem') }}</p> @endif	
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<label class="control-label" for="preco">Preço:</label>
		<input type="text" name="preco" class="form-control" value="@if(isset($imovel)){{$imovel->preco}}@endif"/>
		@if ($errors->has('preco')) <p class="text-danger help-block">{{ $errors->first('preco') }}</p> @endif
	</div>
	<div class="col-md-6">
		<label class="control-label" for="referencia">Referência:</label>
		<input type="text" name="referencia" class="form-control" value="@if(isset($imovel)){{$imovel->referencia}}@endif"/>
		@if ($errors->has('referencia')) <p class="text-danger help-block">{{ $errors->first('referencia') }}</p> @endif
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<label class="control-label" for="descricao">Descrição do imóvel:</label>
		<textarea rows="5" cols="40" name="descricao" class="form-control" >
			@if(isset($imovel)) {{$imovel->descricao}} @endif
		</textarea>
		@if ($errors->has('descricao')) <p class="text-danger help-block">{{ $errors->first('descricao') }}</p> @endif	
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<label class="control-label" for="fotos">Adicionar fotos:</label>
		<input type="file" name="fotos[]" class="form-control" multiple accept="image/x-png,image/gif,image/jpeg">
		<div class="form-group-btn"> 
			<!--button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Adicionar</button-->
		</div>
		@if ($errors->has('fotos.0')) <p class="text-danger help-block">{{ $errors->first('fotos.0') }}</p> @endif	
	</div>
</div>

@if(isset($imovel))
	<div class="row col-sm-12 mb-3">

		@foreach($imovel->fotos as $foto)
			<div class="col-sm-3">
				
						<img src="{{ asset('fotos_imoveis/')}}/{{$foto->filename}}" alt="..." style="width:200px;" class="img-thumbnail">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="{{$foto->id}}" name="apagar_imagem[]" id="defaultCheck1">
							<label class="form-check-label" for="defaultCheck1">
								Apagar imagem
							</label>
						</div>
					
			</div>
		@endforeach
		@if ($errors->has('apagar_imagem')) <p class="text-danger help-block">{{ $errors->first('apagar_imagem') }}</p> @endif	
	</div>	
@endif


<div class='form-group'>
	<button type="submit" class='btn-submit' >Submeter</button>
</div>

<script>
    $(document).ready(function(){
        $('select[name=distrito]').change(function() {
			
            var url = '{{ url("distrito") }}/' + $(this).val() + '/concelho/';
			
			
            $.get(url, function(data) {
                var select = $('form select[name=concelho]');

                select.empty();

                $.each(data,function(key, value) {
                    select.append('<option value=' + value.id + '>' + value.nome_concelho + '</option>');
                });
            });
        });
    });
</script>

<script>
    
        $('select[name=concelho]').change(function() {
            var url = '{{ url("concelho") }}/' + $(this).val() + '/localidade/';
			
            $.get(url, function(data) {
                var select = $('form select[name=localidade]');

                select.empty();

                $.each(data,function(key, value) {
                    select.append('<option value=' + value.id + '>' + value.nome_localidade + '</option>');
                });
            });
        });
    
</script>

<script>
    $(document).ready(function(){
        $('select[name=localidade]').change(function() {
            var url = '{{ url("localidade") }}/'+ $(this).val() + '/codigo_postal/';
			
            $.get(url, function(data) {
                var select = $('form select[name=id_cod_postal]');

                select.empty();

                $.each(data,function(key, value) {
                    select.append('<option value=' + value.id + '>'+ value.num_cod_postal + '-' + value.ext_cod_postal +' ' + value.desig_postal +'</option>');
                });
            });
        });
    });
</script>