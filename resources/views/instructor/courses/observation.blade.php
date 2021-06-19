<x-instructor-layout :course="$course">
    <h1 class="text-2xl font bold">OBSERVACIONES DEL CURSO</h1>
    <hr class="mt-2 mb-6">
    <div>
        {!!$course->observation->body!!}
    </div>
</x-instructor-layout>