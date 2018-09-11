@extends('master')
@section('title', 'Contact')

@section('content')
			<div class="container">

				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default ">
					  <div class="panel-heading">
					    <h3 class="panel-title">Pagos</h3>
					  </div>
					  <div class="panel-body">
					  		<a href="{!! action('PagosPSEController@create') !!}" class="btn btn-default">Nuevo Pago</a>
					  		<hr>
							@if (count($aPagos)>0)
								<table class="table">
									<thead>
										<tr>
											<th>Fecha</th>
											<th>Documento</th>
											<th>Pagador</th>
											<th>Tipo Cta</th>
											<th>Banco</th>
											<th>Descripci&oacute;n</th>
											<th>Monto</th>
											<th>ID Transac.</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
										@foreach($aPagos as $pago)
										<tr>
											<td>{!! date("d-m-Y", strtotime($pago->fecha )) !!}</td>
											<td>{!! $pago->tipodoc.$pago->documento !!}</td>
											<td>{!! $pago->nombre." ".$pago->apellido !!}</td>		
											<td>{!! $pago->tipo_cuenta ? 'Empresa' : 'Persona' !!}</td>		
											<td>{!! $pago->cod_banco !!}</td>
											<td>{!! $pago->descripcion !!}</td>
											<td>{!! $pago->monto !!}</td>
											<td>{!! $pago->transac_id !!}</td>
											<td>{!! $aStatus[$pago->status] !!}</td>

										</tr>
										@endforeach
									</tbody>
									
								</table>
							@else
								<p> No hay Pagos Registrados</p>
							@endif

					  </div>
					</div>			
				</div>	
	</div>
@endsection