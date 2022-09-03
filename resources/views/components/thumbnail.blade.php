@props(['thumbnail'])
<img
    src="{{ isset($thumbnail) ? asset('storage/' . $thumbnail) : asset('images/illustration-1.png') }}"
    alt=""
    srcset=""
    class="rounded-xl"
>