@extends('layouts.app')
@section('title')
<title>Herbhue Personalization Page</title>
@endsection
@section('content')
<div class="container-fluid mb-5">
  <div class="container mt-5">
    <div class="accordion" id="accordionExample">
        @foreach($personalise as $personal)
        <div class="accordion-item">
          <h2 class="accordion-header bg-black text-white" id="heading{{ $loop->index }}">
            <button class="accordion-button bg-black text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="true" aria-controls="collapse{{ $loop->index }}">
              {{$personal->question}}
            </button>
          </h2>
          <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse  @if($loop->index==0)  show @endif" aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <form method="post" action="{{route('personalise.update',$personal->id)}}">
                @csrf
                <textarea name="answer{{ $personal->id }}" id="answer{{ $personal->id }}" class="form-control" placeholder="Give your answer"  required></textarea>

                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-dark  btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loop->index }}">Submit</button>
                </div>
                </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
  </div>
</div>

@foreach($personalise as $personal)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $loop->index }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light-green">
        <h5 class="modal-title fs-5 text-white" id="exampleModalLabel">Few recommendations for you</h5>
      </div>
      <div class="modal-body">
        @php
        $recommendations = DB::table('tbl_recommendation')->where("personalise_id",$personal->id)->first();
        @endphp
        <div class="d-flex justify-content-between mb-3">
          <p>{{ $recommendations->recommendation1 }}</p>
          @if($recommendations->image1!="")
          <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $recommendations->image1 }}" alt="" width="100px">
          @endif
        </div>

        @if($recommendations->recommendation2!="" || $recommendations->image2!="")
        <div class="d-flex justify-content-between mb-3">
          @if($recommendations->recommendation2!="")
          <p>{{ $recommendations->recommendation2 }}</p>
          @endif
          @if($recommendations->image2!="")
          <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $recommendations->image2 }}" alt="" width="100px">
          @endif
        </div>
        @endif

        @if($recommendations->recommendation3!="" || $recommendations->image3!="")
        <div class="d-flex justify-content-between mb-3">
          @if($recommendations->recommendation3!="")
          <p>{{ $recommendations->recommendation3 }}</p>
          @endif
          @if($recommendations->image3!="")
          <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $recommendations->image3 }}" alt="" width="100px">
          @endif
        </div>
        @endif

        @if($recommendations->recommendation4!="" || $recommendations->image4!="")
        <div class="d-flex justify-content-between mb-3">
          @if($recommendations->recommendation4!="")
          <p>{{ $recommendations->recommendation4 }}</p>
          @endif
          @if($recommendations->image4!="")
          <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $recommendations->image4 }}" alt="" width="100px">
          @endif
        </div>
        @endif

        @if($recommendations->recommendation5!="" || $recommendations->image5!="")
        <div class="d-flex justify-content-between mb-3">
          @if($recommendations->recommendation5!="")
          <p>{{ $recommendations->recommendation5 }}</p>
          @endif
          @if($recommendations->image5!="")
          <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $recommendations->image5 }}" alt="" width="100px">
          @endif
        </div>
        @endif

      </div>

      <div class="modal-footer border-top-0">
        <button type="button" class="btn btn-light border-0 bg-transparent text-black fw-bold"  data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection