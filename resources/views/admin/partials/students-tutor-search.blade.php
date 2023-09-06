@if($type="students" && isset($stdlists))

    @foreach ($stdlists as $stdlist)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="studentprofile/{{$stdlist->student_id}}">{{ $stdlist->student_name }}</a></td>
            <td>{{ $stdlist->student_mobile }}</td>

            <td>{{ $stdlist->class_name }}</td>
            <td>
                <div class="form-check form-switch">
                    @if ($stdlist->student_status == 1)
                    <i class="ri-checkbox-circle-line align-middle text-success"></i> Active
                    @else
                    <i class="ri-close-circle-line align-middle text-danger"></i> Inactive
                    @endif
                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1" onclick="changestatus('{{$stdlist->student_id}}','{{$stdlist->student_status}}');" class="checkbox" @if ($stdlist->student_status == 1) then checked

                    @endif>
                </div>
            </td>

            {{-- <td><button class="badge badge-success"
                    onclick="openconfirmmodal({{ $stdlist->demo_id }});">Confirm</button>
                <button class="badge badge-primary"
                    onclick="openupdatemodal({{ $stdlist->demo_id }})">Modify</button>
            </td> --}}
        </tr>
    @endforeach
@endif
@if($type="tutors" && isset($ttrlists))
    @foreach ($ttrlists as $ttrlist)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="tutorprofile/{{ $ttrlist->tutor_id }}">{{ $ttrlist->tutor_name }}</a></td>
            <td>{{ $ttrlist->tutor_mobile }}</td>
            <td>{{ $ttrlist->class_name }}</td>
            <td>{{ $ttrlist->subject_name }}</td>
            <td>{{ $ttrlist->rate }}</td>
            <td><a href="#" onclick="updatecommission('{{$ttrlist->rate_id}}','{{$ttrlist->admin_commission}}')"> {{ $ttrlist->admin_commission }} <span class="badge bg-primary ml-3"> Update</span> </a>
            </td>
            <td>
                <div class="form-check form-switch">
                    @if ($ttrlist->tutor_status == 1)
                    <i class="ri-checkbox-circle-line align-middle text-success"></i> Active
                    @else
                    <i class="ri-close-circle-line align-middle text-danger"></i> Inactive
                    @endif
                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1" onclick="changestatus('{{ $ttrlist->tutor_id }}','{{ $ttrlist->tutor_status }}');"
                    class="checkbox" @if ($ttrlist->tutor_status == 1) then checked @endif>

                </div>
            </td>

        </tr>
    @endforeach
@endif
