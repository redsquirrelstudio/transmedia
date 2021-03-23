<div class="students">
    @foreach($students as $student)
        <a href="{{ url('/student/'.$student->id) }}" class="student-card">
            <div class="avatar">
                @if($student->page->avatar_image)
                    <img src="{{ $student->page->avatar_image->file_url }}" alt="{{ $student->name }}">
                @else
                    <img src="https://via.placeholder.com/300" alt="{{ $student->name }}">
                @endif
            </div>
            <div class="student-details">
                <h2>{{ $student->name }}</h2>
                <h4>
                    @if($student->year === 1)
                        1st Year
                    @elseif($student->year === 2)
                        2nd Year
                    @elseif($student->year === 3)
                        3rd Year
                    @else
                        MA
                    @endif
                    @if($student->getCourse())
                        {{ $student->getCourse()->name }}
                    @endif
                </h4>
                <p>{{ $student->page->tagline }}</p>
            </div>
        </a>
    @endforeach
</div>
