@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class=" mdi mdi-book-open-page-variant title_icon"></i> {{ translate('Pin Numbers') }}
                    
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('status') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                      </button>
                      </div>
                    @endif
                    <div id = "book_content">
                        @include('backend.'.Auth::user()->role.'.pin.list')
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
<script>
    var showAllBooks = function () {
        var url = '{{ route("book.list") }}';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('#book_content').html(response);
                initDataTable("basic-datatable");
            }
        });
    }
</script>
@endsection
