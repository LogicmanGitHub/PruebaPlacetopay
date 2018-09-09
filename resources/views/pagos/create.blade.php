@extends('master')
@section('title', 'Contact')

@section('content')
			<div class="container">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default ">
					  <div class="panel-heading">
					    <h3 class="panel-title">Nuevo Pago</h3>
					  </div>
					  <div class="panel-body">
							<form class="form-horizontal" method="post">
								@foreach ($errors->all() as $error)
								<p class="alert alert-danger">{{ $error }}</p>
								@endforeach
								@if (session('status'))
									<div class="alert alert-success">
										{{ session('status')}}						
									</div>
								@endif
								<input type="hidden" name="_token" value="{!! csrf_token() !!}">
								<fieldset>
									<div class="form-group">
										<label for="seltipocta" class="col-sm-3 control-label">Tipo de Cuenta</label>
										<div class="col-sm-9">
											<select id="seltipocta" class="form-control">
												<option value="Persona">Persona</option>
												<option value="Empresa">Empresa</option>
											</select>
										</div>

									</div>
									<div class="form-group">
										<label for="seltipocta" class="col-sm-3 control-label">Banco</label>
										<div class="col-sm-9">
											<select id="seltipocta" class="form-control">


														@foreach($aBancos->getBankListResult->item as $banco)
						                                  <option class="w3-white altooption" value="{!! $banco->bankCode !!}">{!! $banco->bankName !!}
						                                  </option>
						                                @endforeach
						                    </select>
										</div>


									</div>
									<div class="form-group">
										<div style="text-align: right; margin-right: 20px;">
												<button class="btn btn-default">Cancelar</button>
												<button type="submit" class="btn btn-primary">Seguir</button>		
										</div>
									</div>

								</fieldset>
							</form>					  	

					  </div>
					</div>			
				</div>	
	</div>
@endsection