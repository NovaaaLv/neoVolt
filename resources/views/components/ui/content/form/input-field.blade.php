@props(['type','id','name','required'=>false])

<input @if($required) required @endif type="{{$type}}" name="{{$name}}" id="{{$id}}"
  class=" rounded-[6px] h-[30px] mt-1 w-full bg-transparent text-sm">