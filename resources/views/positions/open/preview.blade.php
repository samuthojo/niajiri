@extends('layouts.page')

@section('page')
{{-- start position preview --}}
<div class="row">
    <div class="col-md-12">

        {{-- start box --}}
        <div class="ibox product-detail">
            {{-- start box content --}}
            <div class="ibox-content">

                <div class="row">
                    {{-- end position details --}}
                    <div class="col-md-12">

                        <h2 class="font-bold m-b-xs">
                            {{$position->title}}
                        </h2>
                        <small>Many desktop publishing packages and web page editors now.</small>
                        <div class="m-t-md">
                            <button class="btn btn-primary pull-right">Add to cart</button>
                            <h2 class="product-main-price">$406,602 <small class="text-muted">Exclude Tax</small> </h2>
                        </div>
                        <hr>

                        <h4>Product description</h4>

                        <div class="small text-muted">
                            It is a long established fact that a reader will be distracted by the readable
                            content of a page when looking at its layout. The point of using Lorem Ipsum is

                            <br/>
                            <br/>
                            There are many variations of passages of Lorem Ipsum available, but the majority
                            have suffered alteration in some form, by injected humour, or randomised words
                            which don't look even slightly believable.
                        </div>
                        <dl class="small m-t-md">
                            <dt>Description lists</dt>
                            <dd>A description list is perfect for defining terms.</dd>
                            <dt>Euismod</dt>
                            <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                            <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                            <dt>Malesuada porta</dt>
                            <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                        </dl>
                    </div>
                    {{-- start position details --}}
                </div>

            </div>
            {{-- end box content --}}
        </div>
        {{-- end box --}}

    </div>
</div>
{{-- end position preview --}}
@endsection
