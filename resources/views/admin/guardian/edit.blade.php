@foreach ($guardians as $guardian)
<div id="editGuardianModal-{{ $guardian->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">
  
  <div class="relative p-4 w-full max-w-2xl max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      
      {{-- Header --}}
      <div class="flex justify-between items-center p-4 border-b rounded-t dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
          Edit Guardian
        </h3>
        <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
            data-modal-toggle="editGuardianModal-{{ $guardian->id }}">✕</button>
      </div>

      {{-- Form --}}
      <form action="{{ route('admin.guardians.update', $guardian->id) }}" method="POST" class="p-4 space-y-4">
        @csrf
        @method('PUT')

        <div class="grid gap-4 sm:grid-cols-2">

          {{-- Name --}}
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Name
            </label>
            <input type="text" name="name" value="{{ $guardian->name }}" required
              class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
          </div>

          {{-- Job --}}
            <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Job
            </label>

            <select name="job"
                class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5
                    dark:bg-gray-700 dark:text-white dark:border-gray-600">

                @php
                $jobs = ['CEO', 'Teacher', 'Engineer', 'Businessman'];
                @endphp

                @foreach ($jobs as $job)
                <option value="{{ $job }}"
                    {{ $guardian->job === $job ? 'selected' : '' }}>
                    {{ $job }}
                </option>
                @endforeach

            </select>
            </div>

          {{-- Email --}}
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Email
            </label>
            <input type="email" name="email" value="{{ $guardian->email }}" required
              class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
          </div>

          {{-- Phone (telpon) --}}
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Phone
            </label>
            <input type="text" name="telpon" value="{{ $guardian->telpon }}"
              class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
          </div>

          {{-- Gender --}}
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Gender
            </label>
            <select name="gender"
              class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">

              <option value="Male" {{ $guardian->gender == 'Male' ? 'selected' : '' }}>Male</option>
              <option value="Female" {{ $guardian->gender == 'Female' ? 'selected' : '' }}>Female</option>

            </select>
          </div>

          {{-- Address --}}
          <div class="sm:col-span-2">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Address
            </label>
            <textarea name="address" rows="4"
              class="block w-full p-2.5 text-sm bg-gray-50 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-white">{{ $guardian->address }}</textarea>
          </div>

        </div>

        <div class="flex justify-end pt-4">
          <button type="submit"
            class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4
                   focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5">
            Update Guardian
          </button>
        </div>

      </form>

    </div>
  </div>
</div>
@endforeach