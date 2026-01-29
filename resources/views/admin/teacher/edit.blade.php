@foreach ($teachers as $teacher)
<div id="editTeacherModal-{{ $teacher->id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">

  <div class="relative p-4 w-full max-w-2xl">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

      {{-- Header --}}
      <div class="flex justify-between items-center p-4 border-b dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
          Edit Teacher
        </h3>
        <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
            data-modal-toggle="editTeacherModal-{{ $teacher->id }}">✕</button>
      </div>

      {{-- Form --}}
      <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST" class="p-4 space-y-4">
        @csrf
        @method('PUT')

        <div class="grid gap-4 sm:grid-cols-2">

          {{-- Name --}}
          <div>
            <label for="name-{{ $teacher->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Name
            </label>
            <input type="text" name="name" id="name-{{ $teacher->id }}"
                value="{{ $teacher->name }}" required
                class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
          </div>

          {{-- Subject --}}
          <div>
            <label for="subject-{{ $teacher->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Subject
            </label>
            <select name="subject_id" id="subject-{{ $teacher->id }}"
              class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
              
              <option value="" class="text-black dark:text-white bg-white dark:bg-gray-800">-- Select Subject --</option>
              @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}"
                  {{ $teacher->subject_id == $subject->id ? 'selected' : '' }}>
                  {{ $subject->availSubject }}
                </option>
              @endforeach

            </select>
          </div>

          {{-- Email --}}
          <div>
            <label for="email-{{ $teacher->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Email
            </label>
            <input type="email" name="email" id="email-{{ $teacher->id }}"
              value="{{ $teacher->email }}" required
              class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
          </div>

          {{-- Phone --}}
          <div>
            <label for="phone-{{ $teacher->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Phone
            </label>
            <input type="text" name="phone" id="phone-{{ $teacher->id }}"
              value="{{ $teacher->phone }}"
              class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
          </div>

          {{-- Address --}}
          <div class="sm:col-span-2">
            <label for="address-{{ $teacher->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Address
            </label>
            <textarea name="address" id="address-{{ $teacher->id }}" rows="3"
              class="block w-full p-2.5 bg-gray-50 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-white">
              {{ $teacher->address }}
            </textarea>
          </div>

        </div>

        {{-- Submit --}}
        <div class="flex justify-end pt-4">
          <button type="submit"
            class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-300
                   font-medium rounded-lg text-sm px-5 py-2.5">
            Update Teacher
          </button>
        </div>

      </form>

    </div>
  </div>

</div>
@endforeach