@extends('layouts.app')

@section('title', 'Config Payment')

@section('content')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">

        {{-- show error --}}
        @if ($errors->any())
            <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- breadcumb --}}
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Config Payment</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Activity</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- end breadcrumd --}}

         <div class="content-body">
                    <section id="table-home">
                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Specialist List</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered text-inputs-searching default-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Fee</th>
                                                            <th>Vat</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($config_payment as $key => $config_payment_item)
                                                            <tr data-entry-id="{{ $config_payment_item->id }}">
                                                                <td>{{ isset($config_payment_item->created_at) ? date("d/m/Y H:i:s",strtotime($config_payment_item->created_at)) : '' }}</td>
                                                                <td>{{ 'IDR '.number_format($config_payment_item->fee) ?? '' }}</td>
                                                                <td>{{ 'IDR '.number_format($config_payment_item->vat) ?? '' }}</td>
                                                                <td class="text-center">

                                                                    <div class="btn-group mr-1 mb-1">
                                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                                        <div class="dropdown-menu">

                                                                            {{-- @can('specialist_show') --}}
                                                                                <a href="#mymodal"
                                                                                    data-remote="{{ route('backsite.specialist.show', $config_payment_item->id) }}"
                                                                                    data-toggle="modal"
                                                                                    data-target="#mymodal"
                                                                                    data-title="Specialist Detail"
                                                                                    class="dropdown-item">
                                                                                    Show
                                                                                </a>
                                                                            {{-- @endcan --}}

                                                                            {{-- @can('specialist_edit') --}}
                                                                                <a class="dropdown-item" href="{{ route('backsite.specialist.edit', $config_payment_item->id) }}">
                                                                                    Edit
                                                                                </a>
                                                                            {{-- @endcan --}}

                                                                            {{-- @can('specialist_delete') --}}
                                                                                <form action="{{ route('backsite.specialist.destroy', $config_payment_item->id) }}" method="POST" onsubmit="return confirm('Are you sure want to delete this data ?');">
                                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                    <input type="submit" class="dropdown-item" value="Delete">
                                                                                </form>
                                                                            {{-- @endcan --}}
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            {{-- not found --}}
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Fee</th>
                                                            <th>Vat</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
    </div>
</div>
<!-- END: Content-->
@endsection
