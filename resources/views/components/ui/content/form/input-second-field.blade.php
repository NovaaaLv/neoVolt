@props(['type','id','name','required'=>false, 'placeholder'=> '','value'=> ''])

<input @if($required) required @endif type="{{$type}}" value="{{$value}}" name="{{$name}}"
  placeholder="{{$placeholder}}" id="{{$id}}"
  class=" rounded-[6px] h-[30px] mt-1 w-full bg-transparent text-sm border-slate-300">