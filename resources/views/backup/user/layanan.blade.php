@extends('layouts.frontend.app')
@section('title', 'Layanan')
@section('content')

<header class="pt-5 pb-3 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Layanan Publik</h1>
        </div>
    </div>
</header>

<div class="container mt-5">
    <div class="row">
        <!-- Tabel Layanan Publik -->
        <div class="col-lg-8">
            <div class="table-responsive">
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
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    {{ $layanan->links() }}
                </ul>
            </nav>
        </div>

        <!-- FAQ Accordion -->
        <div class="col-lg-4">
            <h2 class="mb-4">FAQ</h2>
            <div class="accordion" id="faqAccordion">
                @foreach($faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $faq->id_faq }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id_faq }}" aria-expanded="false" aria-controls="collapse{{ $faq->id_faq }}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $faq->id_faq}}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id_faq }}" data-bs-parent="#faqAccordion">
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
@endsection
