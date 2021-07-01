<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ URL::asset ('/assets/images/logo-light.png') }}" class="logo" alt="Laravel Logo" width="50">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
