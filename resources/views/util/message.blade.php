@if ($message = Session::get('success'))
<div class="bg-green-100 border border-green-400 text-green-700 p-2 rounded relative">
    <button 
        class="right-0 mr-2 font-bold hover:bg-green-300" 
        onclick="this.parentElement.remove()"
    >
        ×
    </button>
    <strong>{{ $message }}</strong>
</div>
@endif

