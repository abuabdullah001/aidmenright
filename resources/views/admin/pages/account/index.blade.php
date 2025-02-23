@extends('admin.masterTemplate')

@section('menu-name')
    Reference
@endsection

@section('main-content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h1 class="h3">{{ __('All Accounts') }}</h1>
            </div>
        </div>
    </div>

    <div class="row m-3">
        <!-- Account Table Section -->
        <div class="col-sm-12 col-md-5 " style="margin-left:240px">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ __('Account List') }}</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Account Code') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($accounts as $key => $account)
                                <tr>
                                    <td>{{ $key + 1 + ($accounts->currentPage() - 1) * $accounts->perPage() }}</td>
                                    <td>{{ $account->accountCode }}</td>
                                    <td>{{ $account->account_name }}</td>
                                    <td class="text-right">
                                        <a class="btn btn-info" href="{{ route('account.edit', $account->id) }}" title="Edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('account.destroy', $account->id) }}"
                                           onclick="return confirm('Are you sure you want to delete this account?')" title="Delete">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">{{ __('No accounts found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="aiz-pagination mt-3">
                        {{ $accounts->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Account Form Section -->
        <div class="col-sm-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ __('Add New Account') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('account.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="accountCode" class="form-label">{{ __('Account Code') }} *</label>
                            <div class="bg-success p-2 text-white rounded" style="display: inline-block;">
                                {{ $accountCode }}
                            </div>
                            <input type="hidden" name="accountCode" value="{{ $accountCode }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="account_name" class="form-label">{{ __('Name') }} *</label>
                            <input type="text" placeholder="{{ __('Enter Account Name') }}" name="account_name" class="form-control" required>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
