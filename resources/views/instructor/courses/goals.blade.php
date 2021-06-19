<x-instructor-layout :course="$course">

    <div>
        @livewire('instructor.courses-goals', ['course' => $course], key('courses-goals'.$user->id))
    </div>
    <div class="my-8">
        @livewire('instructor.courses-requirements', ['course' => $course], key('courses-requirements'.$user->id))
    </div>
    <div>
        @livewire('instructor.courses-audiences', ['course' => $course], key('courses-audiences'.$user->id))
    </div>
</x-instructor-layout>