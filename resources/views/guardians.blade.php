<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="guardians-container">
        <table class="min-w-full border border-gray">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Job</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Telpon</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Address</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Gender</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guardians as $guardian)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$loop->iteration}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$guardian['name']}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$guardian['job']}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$guardian['email']}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$guardian['telpon']}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$guardian['address']}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{$guardian['gender']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>