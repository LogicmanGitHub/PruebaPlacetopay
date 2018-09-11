@extends('master')
@section('title', 'Contact')

@section('content')
			<div class="container">
				<div class="col-md-8 col-md-offset-2">
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
									<h3>Datos Bancarios</h3>									
									<div class="form-group">
										<label for="seltipocta" class="col-sm-12 col-md-2 control-label">Tipo</label>
										<div class="col-sm-12 col-md-3">
											<select id="seltipocta" name="seltipocta" class="form-control">
												<option value="0">Persona</option>
												<option value="1">Empresa</option>
											</select>
										</div>

										<label for="selbanco" class="col-sm-12 col-md-2 control-label">Banco</label>
										<div class="col-sm-12 col-md-5">
											<select id="selbanco" name="selbanco" class="form-control">


										        @if (count($aBancos)>0)
														@foreach($aBancos as $banco)
						                                  <option class="w3-white altooption" value="{!! $banco->bankCode !!}">{!! $banco->bankName !!}
						                                  </option>
						                                @endforeach
										    	@else

										    			<option>No hay Bancos disponibles</option>

						                        @endif
						                    </select>
										</div>
									</div>
									<hr>
									<h3>Datos del Pagador</h3>

									<div class="form-group">
										<label for="tipodoc" class="col-sm-12 col-md-2 control-label">Tipo Doc.</label>
										<div class="col-sm-12 col-md-4">
											<select id="seltipodoc" name="seltipodoc" class="form-control">
												<option value="CC">C&eacute;dula de ciudan&iacute;a colombiana</option>
												<option value="CE">C&eacute;dula de extranjer&iacute;a</option>
												<option value="TI">Tarjeta de identidad</option>
												<option value="PPN">Pasaporte</option>
												<option value="NIT">Numero de identificaci&oacute;n tributaria</option>					
												<option value="SSN">Social Security Number</option>											
											</select>

										</div>
										<label for="documento" class="col-sm-12 col-md-2 control-label">Documento</label>
										<div class="col-sm-12 col-md-4">
											<input type="text" class="form-control" id="title" name="documento" maxlength="12">
										</div>

									</div>									

									<div class="form-group">
										<label for="nombre" class="col-sm-12 col-md-2 control-label">Nombre</label>
										<div class="col-sm-12 col-md-4">
											<input type="text" class="form-control" id="title" name="nombre" maxlength="60">
										</div>

										<label for="apellido" class="col-sm-12 col-md-2 control-label">Apellido</label>
										<div class="col-sm-12 col-md-4">
											<input type="text" class="form-control" id="title" name="apellido" maxlength="60">
										</div>
									</div>									
									<div class="form-group">
										<label for="empresa" class="col-sm-12 col-md-2 control-label">Empresa</label>
										<div class="col-sm-12 col-md-4">
											<input type="text" class="form-control" id="title" name="empresa" maxlength="60">
										</div>
										<label for="email" class="col-sm-12 col-md-2 control-label">Email</label>
										<div class="col-sm-12 col-md-4">
											<input type="text" class="form-control" id="title" name="email" maxlength="60">
										</div>

									</div>	
									<div class="form-group">
										<label for="direccion" class="col-sm-12 col-md-2 control-label">Direcci&oacute;n</label>
										<div class="col-sm-12 col-md-4">
											<input type="text" class="form-control" id="title" name="direccion" maxlength="60">
										</div>
										<label for="ciudad" class="col-sm-12 col-md-2 control-label">Ciudad</label>
										<div class="col-sm-12 col-md-4">
											<input type="text" class="form-control" id="title" name="ciudad" maxlength="60">
										</div>

									</div>	
									<div class="form-group">
										<label for="provincia" class="col-sm-12 col-md-2 control-label">Provincia</label>
										<div class="col-sm-12 col-md-4">
											<input type="text" class="form-control" id="title" name="provincia" maxlength="60">
										</div>
										<label for="pais" class="col-sm-12 col-md-2 control-label">Pais</label>
										<div class="col-sm-12 col-md-4">
											<input type="text" class="form-control" id="title" name="pais" maxlength="60">
										</div>

									</div>	
									<div class="form-group">
										<label for="telefono" class="col-sm-12 col-md-2 control-label">Tel&eacute;fono</label>
										<div class="col-sm-12 col-md-4">
											<input type="text" class="form-control" id="title" name="telefono" maxlength="60">
										</div>
										<label for="movil" class="col-sm-12 col-md-2 control-label">M&oacute;vil</label>
										<div class="col-sm-12 col-md-4">
											<input type="text" class="form-control" id="title" name="movil" maxlength="60">
										</div>

									</div>	

									<h3>Datos del Pago</h3>
									<div class="form-group">
										<label for="descripcion" class="col-sm-12 col-md-2 control-label">Descripci&oacute;n</label>
										<div class="col-sm12 col-md-4">
											<input type="text" class="form-control" id="title" name="descripcion" maxlength="60">
										</div>
										<label for="monto" class="col-sm-12 col-md-2 control-label">Monto</label>
										<div class="col-sm-12 col-md-4">
											<input type="number" class="form-control" id="title" name="monto" min="1" max="100000000">
										</div>
									</div>	



									<div class="form-group">
										<div style="text-align: right; margin-right: 20px;">
												<a href="{!! action('PagosPSEController@index') !!}" class="btn btn-default">Cancelar</a>
												<button type="submit" class="btn btn-primary">Enviar</button>		
										</div>
									</div>

								</fieldset>
							</form>					  	

					  </div>
					</div>			
				</div>	
	</div>
@endsection