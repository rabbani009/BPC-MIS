<form action="{{ route('patch.activity.console', $activity->id) }}" accept-charset="utf-8" method="post">
    @csrf
    @method('patch')

    <table class="table table-striped table-bordered table-responsive">
        <tr>
            <th style="width: 5%">SN.</th>
            <th style="width: 35%">Trainee info</th>
            <th style="width: 15%">Covid Status</th>
            <th>Attendance</th>
        </tr>
        @if($activity->number_of_trainees > 0)
            @for($i = 1; $i <= $activity->number_of_trainees; $i++)
                <tr>
                    <td style="width: 5%">{{ $i }}.</td>
                    <td style="width: 35%">
                        <input class="form-control custom_margin" type="text" name="trainee_{{$i}}_name" placeholder="Name">
                        <div class="mt-2">
                            <input type="radio" id="trainee_{{$i}}_gender" name="trainee_{{$i}}_gender" value="Male" checked>
                            <label for="trainee_{{$i}}_gender">Male</label>
                            <input type="radio" id="trainee_{{$i}}_gender" name="trainee_{{$i}}_gender" value="Female">
                            <label for="trainee_{{$i}}_gender">Female</label>
                            <input type="radio" id="trainee_{{$i}}_gender" name="trainee_{{$i}}_gender" value="Others">
                            <label for="trainee_{{$i}}_gender">Others</label>
                        </div>
                        <input class="form-control custom_margin" type="number" min="1" max="100" name="trainee_{{$i}}_age" placeholder="Age">
                        <input class="form-control custom_margin" type="text" name="trainee_{{$i}}_qualification" placeholder="Qualification">
                        <input class="form-control custom_margin" type="text" name="trainee_{{$i}}_organization" placeholder="Organization">
                        <input class="form-control custom_margin" type="text" name="trainee_{{$i}}_designation" placeholder="Designation">
                        <input class="form-control custom_margin" type="text" name="trainee_{{$i}}_phone" placeholder="Phone">
                        <input class="form-control custom_margin" type="email" name="trainee_{{$i}}_email" placeholder="Email">
                    </td>
                    <td style="width: 15%">
                        <input type="radio" id="registered" name="trainee_{{$i}}_covid_status" value="registered">
                        <label for="registered">Registered</label>
                        <br>
                        <input type="radio" id="not_registered" name="trainee_{{$i}}_covid_status" value="not_registered">
                        <label for="not_registered">Not Registered</label>
                        <br>
                        <input type="radio" id="dose_1" name="trainee_{{$i}}_covid_status" value="dose_1">
                        <label for="dose_1">Dose 1</label>
                        <br>
                        <input type="radio" id="dose_2" name="trainee_{{$i}}_covid_status" value="dose_2" checked>
                        <label for="dose_2">Dose 2</label>
                    </td>
                    <td>
                        <table>
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
                                            <input type="checkbox" id="trainee_{{$i}}_day_{{$j}}_attend" name="trainee_{{$i}}_day_{{$j}}_attend" value="1" {{ $j == 1 ? 'checked' : ''  }}>
                                            <label for="trainee_{{$i}}_day_{{$j}}_attend"> Attended</label><br>
                                        </td>
                                    @endfor
                                </tr>
                            @endif
                        </table>
                    </td>
                </tr>
            @endfor
        @endif
        <tr>
            <td colspan="4">
                <button type="submit"  class="btn btn-block btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-solid fa-user-plus"></i> Save
                </button>
            </td>
        </tr>
    </table>
    {{ Form::hidden('activity_id', $activity->id) }}
    {{ Form::hidden('number_of_trainees', $activity->number_of_trainees) }}
</form>
