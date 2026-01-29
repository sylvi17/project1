@foreach ($students as $student)
<div id="editStudentModal-{{ $student->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">
  
  <div class="relative p-4 w-full max-w-2xl max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      
      {{-- Header --}}
      <div class="flex justify-between items-center p-4 border-b rounded-t dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
          Edit Student
        </h3>
        <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
            data-modal-toggle="editStudentModal-{{ $student->id }}">✕</button>
      </div>

      {{-- Form --}}
      <form action="{{ route('admin.students.update', $student->id) }}" method="POST" class="p-4 space-y-4">
        @csrf
        @method('PUT')
        <div class="grid gap-4 sm:grid-cols-2">
          <div>
            <label for="name-{{ $student->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" id="name-{{ $student->id }}" value="{{ $student->name }}" required class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
          </div>
          <div>
            <label for="classroom-{{ $student->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade</label>
            <select name="classroom_id" id="classroom-{{ $student->id }}" class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
              <option value="">-- Select Classroom --</option>
              @foreach ($classrooms as $classroom)
                <option value="{{ $classroom->id }}" {{ $student->classroom_id == $classroom->id ? 'selected' : '' }}>{{ $classroom->class }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label for="email-{{ $student->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email-{{ $student->id }}" value="{{ $student->email }}" required class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
          </div>
          <div>
            <label for="bday-{{ $student->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthdate</label>
            <input type="date" name="bday" id="bday-{{ $student->id }}" value="{{ $student->bday }}" required class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
          </div>
          <div>
            <label for="gender-{{ $student->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
            <select name="gender" id="gender-{{ $student->id }}" class="bg-gray-50 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white">
              <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
              <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
          </div>
          <div class="sm:col-span-2">
            <label for="address-{{ $student->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
            <textarea name="address" id="address-{{ $student->id }}" rows="4" class="block w-full p-2.5 text-sm bg-gray-50 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-white">{{ $student->address }}</textarea>
          </div>
        </div>
        <div class="flex justify-end pt-4">
          <button type="submit" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700">Update Student</button>
        </div>
      </form>

    </div>
  </div>
</div>
@endforeach