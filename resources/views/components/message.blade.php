@if (Session::has('success'))
<div class="w-full bg-green-300 text-green-700 px-3 py-3 rounded-md border-green-500 mb-4">
{{ Session::get('success') }}
</div>
@endif

@if (Session::has('error'))
<div class="w-full bg-red-300 text-red-700 px-3 py-3 rounded-md border-red-400 mb-4">
{{ Session::get('error') }}
</div>
@endif