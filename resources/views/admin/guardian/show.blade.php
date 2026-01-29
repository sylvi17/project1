{{-- Modal Show Guardian --}}
<div id="showGuardianModal-{{ $guardian->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">

    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            {{-- Header --}}
            <div class="flex justify-between items-center p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Guardian Details
                </h3>
                <button type="button"
                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                    data-modal-toggle="showGuardianModal">
                    ✕
                </button>
            </div>

            {{-- Content --}}
            <div class="p-4 space-y-4">
                <div class="grid gap-4 sm:grid-cols-2">

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" value="{{ $guardian->name }}" disabled
                            class="bg-gray-100 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade</label>
                        <input type="text" value="{{ $guardian->job }}" disabled
                            class="bg-gray-100 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" value="{{ $guardian->email }}" disabled
                            class="bg-gray-100 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telpon</label>
                        <input type="text" value="{{ $guardian->telpon }}" disabled
                            class="bg-gray-100 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                        <input type="text" value="{{ $guardian->gender }}" disabled
                            class="bg-gray-100 border border-gray-300 rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:text-white">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <textarea disabled rows="4"
                            class="block w-full p-2.5 text-sm bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-600 dark:text-white">{{ $guardian->address }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="flex justify-end p-4 border-t dark:border-gray-600">
                <button data-modal-toggle="showGuardianModal"
                    class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>