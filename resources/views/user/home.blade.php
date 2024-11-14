@extends('layouts.front.app')
@section('title', 'Home')
@section('content')
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Welcome To Our Studio!</div>
        <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="">Tell Me More</a>
    </div>
</header>

<section class="articles py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <h2 class="text-center mb-4">Artikel</h2>
        <div class="row" id="berita-container">
            @foreach($berita as $item)
            @php
                $imagePath = public_path('images/' . $item->foto);
                $imageUrl = file_exists($imagePath) ? asset('images/' . $item->foto) : 'https://placehold.co/600x400';
            @endphp
            <div class="col-sm-6 col-md-3 mb-4 berita-item">
                <div class="card h-100 article-card">
                    <img src="{{ $imageUrl }}" class="card-img-top" alt="{{ $item->title_berita }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title_berita }}</h5>
                        <p class="card-text">{{ Str::limit($item->dec_berita, 100) }}</p>
                        <p class="text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-detail" data-title="{{ $item->title_berita }}" data-description="{{ $item->dec_berita }}" data-foto="{{ $imageUrl }}" data-date="{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}" data-author="{{ $item->users->name ?? 'Unknown' }}">Baca Selengkapnya</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination" id="pagination-container"></ul>
            </nav>
        </div>
    </div>
</section>

<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="detailModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-md-5">
                        <img id="modal-image" src="" class="img-fluid rounded shadow-sm mb-3" alt="Detail Berita" style="max-height: 300px; object-fit: cover; width: 100%;">
                    </div>
                    <div class="col-md-7">
                        <p class="text-muted mb-1"><small><span id="modal-date"></span> | By <span id="modal-author"></span></small></p>
                        <p id="modal-description" class="text-justify" style="line-height: 1.6;"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .article-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    }
    .article-card:hover {
        transform: scale(1.05); 
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3) !important;
    }
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
    .modal-content {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    .modal-header {
        background-color: #f8f9fa;
    }
    .modal-body {
        color: #333;
    }
    .modal-footer .btn-secondary {
        background-color: #6c757d;
        color: #fff;
        border: none;
    }
    .modal-footer .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        var itemsPerPage = 4;
        var totalItems = $(".berita-item").length;
        var totalPages = Math.ceil(totalItems / itemsPerPage);
        var currentPage = 1;

        function showPage(page) {
            $(".berita-item").hide();
            var start = (page - 1) * itemsPerPage;
            var end = start + itemsPerPage;
            $(".berita-item").slice(start, end).show();

            $(".page-item").removeClass("active");
            $(`[data-page="${page}"]`).parent().addClass("active");

            currentPage = page;

            if (currentPage === 1) {
                $(".page-item.previous").addClass("disabled");
            } else {
                $(".page-item.previous").removeClass("disabled");
            }

            if (currentPage === totalPages) {
                $(".page-item.next").addClass("disabled");
            } else {
                $(".page-item.next").removeClass("disabled");
            }
        }

        function generatePagination() {
            var paginationHTML = '<li class="page-item previous disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>';

            for (var i = 1; i <= totalPages; i++) {
                paginationHTML += `<li class="page-item"><a class="page-link page-link-number" href="#" data-page="${i}">${i}</a></li>`;
            }

            paginationHTML += '<li class="page-item next"><a class="page-link" href="#">Next</a></li>';
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

        $(document).on("click", ".btn-detail", function () {
            var title = $(this).data("title");
            var description = $(this).data("description");
            var foto = $(this).data("foto");
            var date = $(this).data("date");
            var author = $(this).data("author");

            $("#detailModalLabel").text(title);
            $("#modal-image").attr("src", foto);
            $("#modal-date").text(date);
            $("#modal-description").text(description);
            $("#modal-author").text(author);

            $("#detailModal").modal("show");
        });

        showPage(1);
        generatePagination();
    });
</script>
@endsection
