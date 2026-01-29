<x-layout>
    <x-slot:judul>{{$title}}</x-slot:judul>
    <div class="kontak-container">
        <h1 class="kontak-title">Kontak Saya</h1>
        <ul class="kontak-list">
            <li><strong>Whatsapp:</strong> {{$wasap}}</li>
            <li><strong>Instagram:</strong> {{$insta}}</li>
            <li><strong>Second Insta:</strong> {{$secAcc}}</li>
            <li><strong>Github:</strong> {{$git}}</li>
        </ul>
    </div>

</x-layout>