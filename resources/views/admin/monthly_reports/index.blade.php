@extends('layouts.admin')

@section('content')

    <div class="container">
        <h3 class="page-title">Laporan Keuangan</h3>

        <form  method="get">
            <div class="row">
                <div class="col-xs-1 col-md-4 form-group">
                <label for="year">Tahun</label>
                @php
                    $years = collect(range(2, 0))->map(function ($item) {
                    return (string) date('Y') - $item;
                });
                    $months = cal_info(0)['months'];
                @endphp
                <select name="y" class="form-control" id="y">
                @foreach($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
                </select>
                </div>
                <div class="col-xs-2 col-md-4 form-group">
                <label for="month">Bulan</label>
                <select name="m" class="form-control" id="y">
                @foreach($months as $month)
                        <option value="{{ $month }}">{{ $month }}</option>
                @endforeach
                </select>
                </div>
                <div class="col-xs-4">
                    <label class="control-label">&nbsp;</label><br>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>

            <div class="row">
                <div class="col-xs-1 col-md-1 form-group">
                </div>
                <div class="col-xs-2 col-md-2 form-group">
                </div>
                <div class="col-xs-4">
                    <label class="control-label">&nbsp;</label><br>
                </div>
            </div>

        <div class="card p-3">
            <div class="card-heading">
                Laporan
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Pemasukan</th>
                                <td>{{ auth()->user()->currency->symbol . ' ' . number_format($inc_total, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                            </tr>
                            <tr>
                                <th>Pengeluaran</th>
                                <td>{{ auth()->user()->currency->symbol . ' ' . number_format($exp_total, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                            </tr>
                            <tr>
                                <th>Keuntungan</th>
                                <td>{{ auth()->user()->currency->symbol . ' ' . number_format($profit, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Kategori Pemasukan</th>
                                <th>{{ auth()->user()->currency->symbol . ' ' . number_format($inc_total, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</th>
                            </tr>
                        @foreach($inc_summary as $inc)
                            <tr>
                                <th>{{ $inc['name'] }}</th>
                                <td>{{ auth()->user()->currency->symbol . ' ' . number_format($inc['amount'], 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Kategori Pengeluaran</th>
                                <th>{{ auth()->user()->currency->symbol . ' ' . number_format($exp_total, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</th>
                            </tr>
                        @foreach($exp_summary as $inc)
                            <tr>
                                <th>{{ $inc['name'] }}</th>
                                <td>{{ auth()->user()->currency->symbol . ' ' . number_format($inc['amount'], 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
