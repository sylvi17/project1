<div id="showClassroomModal-{{ $classroom->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">

    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            {{-- Header --}}
            <div class="flex justify-between items-center p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Classroom Details
                </h3>
                <button type="button"
                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                    data-modal-toggle="showClassroomModal-{{ $classroom->id }}">
                    ✕
                </button>
            </div>

            {{-- Content --}}
            <div class="p-4 space-y-4">
                <div class="grid gap-4 sm:grid-cols-2">

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                        <input type="text" value="{{ $classroom->class }}" disabled
                            class="bg-gray-100 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                    </div>

                    <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Students</label>

                    @if ($classroom->students->count())
                        <div class="flex flex-wrap gap-2">

                            @foreach ($classroom->students as $student)
                                <span class="px-3 py-1 bg-gray-200 text-gray-900 text-sm rounded-lg dark:bg-gray-600 dark:text-white">
                                    {{ $student->name }}
                                </span>
                            @endforeach

                        </div>
                    @else
                        <p class="text-gray-500 dark:text-gray-300 text-sm">
                            No students assigned to this classroom.
                        </p>
                    @endif
                </div>

                </div>
            </div>

            {{-- Footer --}}
            <div class="flex justify-end p-4 border-t dark:border-gray-600">
                <button data-modal-toggle="showClassroomModal-{{ $classroom->id }}"
                    class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>