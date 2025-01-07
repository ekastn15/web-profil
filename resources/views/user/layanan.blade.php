@extends('layouts.front.app')
@section('title', 'Team')
@section('content')
<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="section-heading text-uppercase text-white">Layanan dan FAQ</h1>
        </nav>
    </div>
</div>
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive layanan-item">
                    <table class="table table-bordered table-striped table-hover text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Layanan Publik</th>
                                <th>Tautan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($layanan as $item)
                            <tr>
                                <td>{{ $item->name_layanan }}</td>
                                <td>
                                    <a href="{{ $item->link_layanan }}" target="_blank" rel="noopener noreferrer">
                                        {{ $item->link_layanan }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination" id="pagination-container"></ul>
                    </nav>
                </div>
            </div>

            <!-- FAQ Accordion -->
            <div class="col-lg-12">
                <h2 class="mb-4">FAQ</h2>
                <div class="accordion" id="faqAccordion">
                    @foreach($faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $faq->id }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                aria-controls="collapse{{ $faq->id }}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                            aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
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
        var totalItems = $(".layanan-item").length;
        var totalPages = Math.ceil(totalItems / itemsPerPage);
        var currentPage = 1;

        function showPage(page) {
            $(".layanan-item").hide();
            var start = (page - 1) * itemsPerPage;
            var end = start + itemsPerPage;
            $(".layanan-item").slice(start, end).show();
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