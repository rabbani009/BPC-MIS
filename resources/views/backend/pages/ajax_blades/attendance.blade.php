<table class="table table-bordered text-center">
    @php($activity_duration = 5)
    @if($activity_duration > 0)
        <tr>
            <!-- in this loop -1 for get the exact days from activity duration-->
            @for($j = 1; $j <= ($activity_duration); $j++)
                <th>Day {{$j}}</th>
            @endfor
        </tr>
        <tr>
            <!-- in this loop -1 for get the exact days from activity duration-->
            @for($j = 1; $j <= ($activity_duration); $j++)
                <td>
                    <input type="checkbox" id="day_{{$j}}_attend" name="day_{{$j}}_attend" value="1" {{ $j == 1 ? 'checked' : ''  }}>
                    <label for="day_{{$j}}_attend"> Attended</label><br>
                </td>
            @endfor
        </tr>
    @endif
</table>
