@extends('layout.backend')
@section('title','Landing-page items')
@section('content')
<div class="container-fluid">
    <div class="col-xl-10 offset-xl-1 box-margin height-card">
        <div class="card card-body">
            <h4 class="card-title mb-2 text-center">Add Landing-page items</h4>
            <div class="row">
                @if(session('failed'))
                <div class="col-12">
                    <p class="alert alert-danger">{{ session('failed') }}</p>
                </div>
                @endif
                <div class="col-sm-12 col-xs-12">
                    <form action="{{ route('backend.landing-page-item.create') }}" method="post">
                        @csrf

                        <div class="form-group mt-5">
                            <label>Landing-page item type :</label>
                            @foreach(\App\Models\LandingPageItem::$types as $type)
                            <input type="radio" class="form-check-input ml-1 @error('landing_page_item') is-invalid @enderror" name="landing_page_item" id="{{ $type }}" value="{{ $type }}">
                            <label for="{{ $type }}" class="form-check-label ml-4">
                                <img src="{{ asset("backend/landing-pages/item-image/$type.png") }}" width="150" alt="">
                            </label>
                            @endforeach
                        </div>
                        @error('landing_page_item')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group d-none" id="ad-id">
                            <label for="category">Select Ad :</label>
                            <select class="form-control @error('ad_id') is-invalid @enderror"  name="ad_id" id="" aria-label=".form-select-lg example">
                                <option value="" selected>Select Ad</option>
                                    @foreach($ads as $ad)
                                        <option value="{{ $ad->id }}">{{ $ad->title }}</option>
                                    @endforeach
                            </select>
                        </div>
                        @error('ad_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="status">Status :</label>
                            <input type="radio" class="form-check-input ml-1 @error('status') is-invalid @enderror" name="status" id="published" value="published" checked>
                            <label for="published" class="form-check-label ml-4">Published</label>
                            <input type="radio" class="form-check-input ml-1 @error('status') is-invalid @enderror" name="status" id="unpublished" value="unpublished">
                            <label for="unpublished" class="form-check-label ml-4">Unpublished</label>
                        </div>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                        <button onclick="history.go(-1);" class="btn btn-danger">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

    $(document).ready(function() {
        $('input[name="landing_page_item"]').click(function() {
            var selected = $(this).val();

            if (selected == "advertise") {
                $('#ad-id').removeClass('d-none');
            } else {
                $('#ad-id').addClass('d-none');
            }
        });
    });


</script>
@endsection
