@extends('layouts.app')
@section('content')
  <h2 class="text-4xl font-extrabold text-[#B7669A] mb-8 text-center border-b-4 border-[#6F2C5C] pb-3">
    Kalender Akademik
  </h2>
  <div class="flex justify-center items-center">

    <iframe
      src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=Asia%2FJakarta&showPrint=0&showTitle=0&showTz=0&title=Kalender%20Akademik&showCalendars=0&src=ZGFmZmFrdXJhbWExMEBnbWFpbC5jb20&src=NzE5YjJlYjg0NjZiMzIzZGJjZWJlYzQzZDZlZDZjMjFkMDBhNGUxMDQ0MDFjZjM5ZmM4MWE2ZGQ3OGEzMGQ0ZUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=aWQuaW5kb25lc2lhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=ZW4uaW5kb25lc2lhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%23039be5&color=%23009688&color=%230b8043&color=%237986cb"
      style=" border-width:0 " width="100%" height="650" frameborder="0" scrollin></iframe>
  </div>
@endsection
