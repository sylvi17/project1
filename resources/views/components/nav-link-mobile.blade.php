@props(['active' => false])
<div>
           <a {{$attributes}} aria-current="page" 
            class="{{$active  
            ? 'block rounded-md bg-gray-950/50 px-3 py-2 text-base font-medium text-white'
            : 'block rounded-md px-3 py-2 text-base font-medium text-gray hover:bg-white/5 hover:text-gray'}}">{{$slot}}</a>
</div>