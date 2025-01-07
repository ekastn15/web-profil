<footer class="footer py-4">
<footer class="footer py-9">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2024</div>
            <div class="col-lg-4 my-3 my-lg-0">
                @php
                    $kontak = \App\Models\Kontak::where('id_dinas', 1)->first();;
                @endphp
                <a class="btn btn-dark btn-social mx-2" href="https://wa.me/{{ $kontak->nomer_wa }}"><i class="fab fa-whatsapp"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="mailto:{{ $kontak->email_dinas }}"><i class="fa fa-envelope"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="{{ $kontak->instagram_dinas }}"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
