<!-- Details -->
<table class="table app-table-hover mb-0 text-left">    
    <tbody>
        @foreach ($view_data as $t =>$d)
        <tr>
            <td class="cell"><span class="fw-semibold">{{ $t }}</span></td>
            <td class="cell">
                @if (is_array($d))
                    <ul>
                    @foreach ($d as $i =>$j)
                        <li data-toggle="tooltip" title="{{ $j['tooltip'] }}">{!! $j['lable'] !!}</li>
                    @endforeach
                    </ul>
                @else
                    <span class="truncate">{{ $d }}</span>
                @endif
            </td>          
        </tr>
        @endforeach
    </tbody>
</table>