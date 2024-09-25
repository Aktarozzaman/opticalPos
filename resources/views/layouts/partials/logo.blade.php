<div class="row">
	@if(file_exists(public_path('uploads/logo.png')))
		<div class="col-xs-12" style="text-align:end">
			<img src="/uploads/logo.png" class="img-rounded" alt="Logo" width="150" style="margin-bottom: 20px;filter: brightness(0) invert(1);">
		</div>
	@else
    	<h1 class="text-center page-header">{{ config('app.name', 'CyberSpark Pos') }}</h1>
    @endif
</div>