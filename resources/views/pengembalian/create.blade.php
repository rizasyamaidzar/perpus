@extends('layouts.main')

@section('content')
<div class="m-10">
    <h1 class="text-center">Form pengembalian</h1>
    <form method="POST" action="/kembali"  enctype="multipart/form-data" class="p-4 md:p-5">
        @csrf         
       
        <div id="reader" width="600px"></div>
        <input type="hidden" name="isbn" id="hiddenInput" value="hiddenInput">
        <button type="submit" class="mt-5 bg-blue-700 hover:text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
    </form>
</div>
@endsection    

@section('script')
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<script>
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: {width: 250, height: 250} },
        /* verbose= */ false
    );

    html5QrcodeScanner.render(onScanSuccess);

    function onScanSuccess(decodedText, decodedResult) {
        // Mengisi nilai input hidden dengan hasil scan
        document.getElementById("hiddenInput").value = decodedText;

        // Menghentikan pemindaian setelah berhasil mendapatkan data dari scan
        html5QrcodeScanner.clear();
    }

    function onScanFailure(error) {
        console.warn(`Code scan error = ${error}`);
    }
</script>
@endsection
