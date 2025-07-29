@extends('layouts.rally-2')

@section('title', 'QR Scanner - Rally 2')

@section('content')
    <div class="flex justify-between items-center p-4 bg-yellow-600">
        <a href="{{ route('rally-2.index') }}" class="text-black text-2xl">
            <x-ri-arrow-left-s-line class="w-10 h-10 text-black" />
        </a>
        <div class="text-xl font-bold text-black">QR SCANNER</div>
        <button onclick="toggleSideMenu()">
            <x-radix-text-align-justify class="w-10 h-10 text-black" />
        </button>
    </div>

    <div class="p-4 text-center">
        <h1 class="text-[50px] font-bold text-black">SCAN QR</h1>
        <div id="qr-reader-container" class="relative overflow-hidden mx-auto"
            style="width:100%; max-width:400px; height: 350px;">
            <div id="qr-reader" class="w-full h-full flex items-center justify-center">
                <script src="https://unpkg.com/html5-qrcode"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        function startScanner(cameraConfig) {
                            const qrReader = new Html5Qrcode("qr-reader");
                            qrReader.start(
                                cameraConfig,
                                {
                                    fps: 10,
                                    qrbox: { width: 400, height: 350 },
                                },
                                qrCodeMessage => {
                                    qrReader.stop().then(() => {
                                        console.log("QR Code Detected:", qrCodeMessage);

                                        if (/^M-\d+$/.test(qrCodeMessage)) {
                                            // QR untuk Mystery Envelope
                                            const id_envelope = qrCodeMessage.split('-')[1];
                                            window.location.href = `/mystery-envelope/${id_envelope}`;
                                        } else if (/^\d+$/.test(qrCodeMessage)) {
                                            // QR untuk Soal
                                            const id_soal = qrCodeMessage;
                                            window.location.href = `${id_soal}`;
                                        } else {
                                            // Format tidak dikenali
                                            document.getElementById("qr-reader-results").innerText = "QR tidak valid!";
                                        }
                                    }).catch(err => {
                                        console.error("Gagal stop kamera:", err);
                                    });
                                },
                                errorMessage => {
                                }
                            );
                        }

                        Html5Qrcode.getCameras().then(cameras => {
                            if (cameras && cameras.length) {
                                const backCamera = cameras.find(cam =>
                                    cam.label.toLowerCase().includes("back") ||
                                    cam.label.toLowerCase().includes("rear") ||
                                    cam.label.toLowerCase().includes("environment")
                                );
                                if (backCamera) {
                                    startScanner({ deviceId: { exact: backCamera.id } });
                                } else {
                                    startScanner({ deviceId: { exact: cameras[0].id } });
                                }
                            } else {
                                document.getElementById("qr-reader-results").innerText = "Tidak ditemukan kamera!";
                            }
                        }).catch(() => {
                            document.getElementById("qr-reader-results").innerText = "Gagal mengakses kamera!";
                        });
                    });
                </script>
            </div>
        </div>
    </div>

    <x-rally-2-sidebar />
@endsection