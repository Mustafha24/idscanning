
$(document).on('load',()=>{
        function onScanSuccess(decodedText, decodedResult) {
            $('#scan_result').html(decodedResult);
        }

        function onScanFailure(error) {

            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader",
            { fps: 10, qrbox: {width: 250, height: 250} },
            /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
})
document.getElementById("reader").getElementsByTagName('div')[0].style.display='none';