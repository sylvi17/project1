<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-visible">
                {{-- Search & Add --}}
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form action="{{ route('admin.teachers.index') }}" method="GET" class="flex items-center">
                            <label for="search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <input
                                    type="text"
                                    name="search"
                                    id="search"
                                    value="{{ request('search') }}"
                                    placeholder="Search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-3 p-2.5"
                                >
                            </div>
                            <button type="submit" class="ml-2 px-3 py-2 bg-primary-600 text-white rounded-lg">Search</button>
                        </form>
                    </div>

                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add Teacher
                        </button>
                    </div>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-4 py-3">NO</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Subject Name</th>
                                <th class="px-4 py-3">Phone</th>
                                <th class="px-4 py-3">Address</th>
                                <th class="px-4 py-3"><span class="sr-only">Actions</span></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td class="px-4 py-2 text-left text-white">{{$loop->iteration}}</td>
                                <td class="px-4 py-2 text-left text-white">{{$teacher['name']}}</td>
                                <td class="px-4 py-2 text-left text-white">{{$teacher->subject->availSubject}}</td>
                                <td class="px-4 py-2 text-left text-white">{{$teacher['email']}}</td>
                                <td class="px-4 py-2 text-left text-white">{{$teacher['address']}}</td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button data-dropdown-toggle="dropdown-{{ $teacher->id }}" class="inline-flex items-center p-0.5 text-sm font-medium text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>

                                    <div id="dropdown-{{ $teacher->id }}" 
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">

                                            <li>
                                                <button type="button"
                                                    data-modal-target="showTeacherModal-{{ $teacher->id }}"
                                                    data-modal-toggle="showTeacherModal-{{ $teacher->id }}"
                                                    class="open-edit-modal block w-full text-left py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Show
                                                </button>
                                            </li>

                                            <li>
                                                <button type="button"
                                                    data-modal-target="editTeacherModal-{{ $teacher->id }}"
                                                    data-modal-toggle="editTeacherModal-{{ $teacher->id }}"
                                                    class="open-edit-modal block w-full text-left py-2 px-4 hover:bg-gray-100 
                                                        dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Edit
                                                </button>
                                            </li>

                                        </ul>

                                        <div class="py-1">
                                            <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin hapus guru ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="w-full text-left py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 
                                                            dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                    <span class="font-semibold text-gray-900 dark:text-white">
                        {{ $teachers->firstItem() ?? 0 }}-{{ $teachers->lastItem() ?? 0 }}
                    </span>

                    <span class="font-semibold text-gray-900 dark:text-white">
                        {{ $teachers->total() }}
                    </span>

                    <div class="mt-4">{{ $teachers->links() }}</div>

                    <ul class="inline-flex items-stretch -space-x-px">
                    <li>
                        <li>
                            @if ($teachers->onFirstPage())
                                <span class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    ❮
                                </span>
                            @else
                                <a href="{{ $teachers->previousPageUrl() }}"
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    ❮
                                </a>
                            @endif
                        </li>
                    </li>
                    @foreach ($teachers->links()->elements[0] as $page => $url)
                        <li>
                            @if ($page == $teachers->currentPage())
                                <span class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                class="flex items-center justify-center text-sm py-2 px-3
                                text-gray-500 bg-white border border-gray-300 hover:bg-gray-100">
                                    {{ $page }}
                                </a>
                            @endif
                        </li>
                    @endforeach
                    <li>
                        @if ($teachers->hasMorePages())
                            <a href="{{ $teachers->nextPageUrl() }}"
                            class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                ❯
                            </a>
                        @else
                            <span class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                ❯
                            </span>
                        @endif
                    </li>
                </ul>
                </nav>
            </div>

            {{-- Modal Add --}}
            <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add Teacher</h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="space-y-4">
                            @include('admin.teacher.create')
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modals Edit per teacher --}}
            @foreach ($teachers as $teacher)
                @include('admin.teacher.edit', ['teacher' => $teacher, 'subjects' => $subjects])
            @endforeach

            {{-- Modals SHOW per teacher --}}
            @foreach ($teachers as $teacher)
                @include('admin.teacher.show', ['teacher' => $teacher])
            @endforeach
        </div>
    </section>
</x-admin.layout>