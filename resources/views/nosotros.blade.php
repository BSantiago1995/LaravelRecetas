<h1>Desde nuestra vista</h1>
@php
$variable=20;
@endphp
<!-- siempre que se abre un @ se debe cerrar-->
@if($variable==20)
{{"El valor es 20\n"}}
@endif
@for($i=0;$i<20;$i++)
{{$i.","}}
@endfor
{{$variable}}