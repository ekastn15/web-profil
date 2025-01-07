@extends('layouts.front.app')
@section('title', 'Team')
@section('content')
<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="section-heading text-uppercase text-white">Pegawai</h1>
        </nav>
    </div>
</div>
<section class="page-section bg-light" id="team-container">
    <div class="row justify-content-center">
        @foreach($pejabat as $item)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4 pejabat-item">
            <div class="team-member text-center">
                <img class="mx-auto rounded-circle" src="{{ asset('images/' . $item->foto) }}" alt="{{ $item->name }}">
                <h4>{{ $item->name }}</h4>
                <p class="text-muted">{{ $item->jabatan }}</p>
            </div>
        </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination" id="pagination-container"></ul>
        </nav>
    </div>
</section>
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
        var totalItems = $(".pejabat-item").length;
        var totalPages = Math.ceil(totalItems / itemsPerPage);
        var currentPage = 1;

        function showPage(page) {
            $(".pejabat-item").hide();
            var start = (page - 1) * itemsPerPage;
            var end = start + itemsPerPage;
            $(".pejabat-item").slice(start, end).show();
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