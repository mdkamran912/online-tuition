@foreach ($demos as $demo)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td><a href="studentprofile/{{$demo->student_id}}">{{ $demo->student_name }}</a></td>
        <td>{{ $demo->student_mobile }}</td>
        <td><a href="tutorprofile/{{$demo->tutor_id}}">{{ $demo->tutor }}</a></td>
        <td>{{ $demo->tutor_mobile }}</td>
        <td>{{ $demo->class_name }}</td>
        <td>{{ $demo->subject }}</td>
        <td>
            @if ($demo->status == 1)
                <span class="badge bg-info">{{ $demo->currentstatus }}</span>
            @elseif ($demo->status == 2)
                <span class="badge bg-primary">{{ $demo->currentstatus }}</span>
            @elseif ($demo->status == 3)
                <span class="badge bg-success">{{ $demo->currentstatus }}</span>
            @elseif ($demo->status == 4)
                <span class="badge bg-success">{{ $demo->currentstatus }}</span>
            @elseif ($demo->status == 5)
                <span class="badge bg-danger">{{ $demo->currentstatus }}</span>
            @endif
        </td>
        <td>{{ $demo->slot_1 }}</td>
        <td>{{ $demo->slot_2 }}</td>
        <td>{{ $demo->slot_3 }}</td>
        <td>{{ $demo->slot_confirmed }}</td>
        <td><a href="{{ $demo->demo_link }}">{{ $demo->demo_link }}</a></td>
        <td>{{ $demo->remarks }}</td>
        <td><button class="btn btn-sm btn-success"
                onclick="openconfirmmodal({{ $demo->demo_id }});">Confirm</button>
            <button class="btn btn-sm btn-primary"
                onclick="openupdatemodal({{ $demo->demo_id }})">Modify</button>
        </td>
    </tr>
@endforeach
