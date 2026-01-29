@foreach ($classrooms as $classroom)
<div id="editClassroomModal-{{ $classroom->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">
  
  <div class="relative p-4 w-full max-w-2xl max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      
      {{-- Header --}}
      <div class="flex justify-between items-center p-4 border-b rounded-t dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
          Edit Classroom
        </h3>
        <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
            data-modal-toggle="editClassroomModal-{{ $classroom->id }}">✕</button>
      </div>

      {{-- Form --}}
      <form action="{{ route('admin.classrooms.update', $classroom->id) }}" method="POST" class="p-4 space-y-4">
        @csrf
        @method('PUT')

        <div class="grid gap-4 sm:grid-cols-2">

          {{-- Name --}}
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Name
            </label>
            <input type="text" name="class" value="{{ $classroom->class }}" required
              class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
          </div>

          

        </div>

        <div class="flex justify-end pt-4">
          <button type="submit"
            class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4
                   focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5">
            Update Classroom
          </button>
        </div>

      </form>

    </div>
  </div>
</div>
@endforeach