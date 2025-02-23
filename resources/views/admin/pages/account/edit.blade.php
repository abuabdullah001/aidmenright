@extends('admin.masterTemplate')
@section('menu-name')
Reference
@endsection
@section('main-content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{('Account Information')}}</h5>
</div>

<div class="row">
  <div class="col-lg-6" style="margin-left:370px;margin-top:50px">
      <div class="card">
          <div class="card-body p-0">
              {{-- <ul class="nav nav-tabs nav-fill language-bar">
    				@foreach (get_all_active_language() as $key => $language)
    					<li class="nav-item">
    						<a class="nav-link text-reset @if ($language->code == $lang) active @endif py-3" href="{{ route('cities.edit', ['id'=>$city->id, 'lang'=> $language->code] ) }}">
    							<img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
    							<span>{{ $language->name }}</span>
    						</a>
    					</li>
  	            @endforeach
    			</ul> --}}
              <form class="p-4" action="{{ route('account.update', $account->id) }}" method="POST" enctype="multipart/form-data">
                  <input name="_method" type="hidden" value="PATCH">
                  @csrf
                  <div class="form-group mb-3">
                      <label for="name">{{('Name')}}</label>
                      <input type="text" value="{{ $account->accountCode }}" readonly name="accountCode" class="form-control" required>
                  </div>
                  <div class="form-group mb-3">
                      <label for="name">{{('Name')}}</label>
                      <input type="text" value="{{ $account->account_name }}" name="account_name" class="form-control" required>
                  </div>


                  <div class="form-group mb-3 text-right">
                      <button type="submit" class="btn btn-primary">{{('Update')}}</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

@endsection
