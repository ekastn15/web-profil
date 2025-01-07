@extends('layouts.front.app')
@section('title', 'Home')
@section('content')
<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="section-heading text-uppercase text-white">Foto</h1>
        </nav>
    </div>
</div>
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="row justify-content-center"">
            @foreach ($gambar as $image)
            <div class=" col-lg-4 col-md-6 col-sm-12 mb-4 image-item">
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="{{ asset('images/' . $image->random_foto) }}"
                        style="height: 300px !important;">
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">{{$image->agenda->name_agenda}}</div>
                    <div class="portfolio-caption-subheading text-muted">{{$image->agenda->tanggal}}</div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-4 col-sm-6 mb-4">
            <!-- Portfolio item 2-->
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="{{ asset('images/' . $image->random_foto) }}" alt="..." />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">Explore</div>
                    <div class="portfolio-caption-subheading text-muted">Graphic Design</div>
                </div>
            </div>
        </div> --}}
        @endforeach
    </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination" id="pagination-container"></ul>
        </nav>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal">
                    <img src="{{asset('assets/landing_page/assets/img/close-icon.svg')}}" alt="Close modal">
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">{{$image->agenda->name_agenda}}</h2>
                                <p class="item-intro text-muted">{{$image->agenda->tanggal}}</p>
                                <div class="d-flex">
                                    @foreach(explode(',', $image->foto_galeri) as $foto)
                                    <div style="margin-right: 10px;">
                                        <img class="img-fluid d-block mx-auto"
                                            src="{{ asset('images/' . trim($foto)) }}" alt="Foto Galeri" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('styles')
    <style>
        .pagination .page-link {
            color: #007bff;
            border-radius: 50%;
            margin: 0 5px;
            transition: all 0.3s;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
            box-shadow: 0px 4px 10px rgba(0, 123, 255, 0.3);
        }

        .pagination .page-item .page-link:hover {
            background-color: #e9ecef;
        }
    </style>
    @endsection

    @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
        var itemsPerPage = 6;
        var totalItems = $(".image-item").length;
        var totalPages = Math.ceil(totalItems / itemsPerPage);
        var currentPage = 1;

        function showPage(page) {
            $(".image-item").hide();
            var start = (page - 1) * itemsPerPage;
            var end = start + itemsPerPage;
            $(".image-item").slice(start, end).show();
            $(".page-item").removeClass("active");
            $(`[data-page="${page}"]`).parent().addClass("active");
            currentPage = page;

            $(".page-item.previous").toggleClass("disabled", currentPage === 1);
            $(".page-item.next").toggleClass("disabled", currentPage === totalPages);
        }

        function generatePagination() {
            var paginationHTML = `
                <li class="page-item previous disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>`;

            for (var i = 1; i <= totalPages; i++) {
                paginationHTML += `<li class="page-item">
                    <a class="page-link page-link-number" href="#" data-page="${i}">${i}</a>
                </li>`;
            }

            paginationHTML += `
                <li class="page-item next">
                    <a class="page-link" href="#">Next</a>
                </li>`;
            $("#pagination-container").html(paginationHTML);
        }

        $(document).on("click", ".page-link-number", function (e) {
            e.preventDefault();
            var page = $(this).data("page");
            showPage(page);
        });

        $(document).on("click", ".page-item.previous", function (e) {
            e.preventDefault();
            if (currentPage > 1) {
                showPage(currentPage - 1);
            }
        });

        $(document).on("click", ".page-item.next", function (e) {
            e.preventDefault();
            if (currentPage < totalPages) {
                showPage(currentPage + 1);
            }
        });

        showPage(1);
        generatePagination();
    });
    </script>
    @endsection