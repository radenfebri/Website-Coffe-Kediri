@extends('backend.layouts.master-lainnya')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <form action="{{ route('pesanan.update', encrypt($order->id) ) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="middle-content container-xxl p-0">
                
                <div class="row invoice layout-top-spacing layout-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        <div class="doc-container">

                            <div class="row">
                                <div class="col-xl-9">

                                    <div class="invoice-content">

                                        <div class="invoice-detail-body">

                                            <div class="invoice-detail-title">

                                                <div class="invoice-logo">
                                                    <div class="profile-image">

                                                        <div class="img-uploader-content">
                                                            <img src="" alt="">
                                                            {{-- <input type="file" class="filepond" name="filepond" accept="image/png, image/jpeg, image/gif"/> --}}
                                                        </div>
                                    
                                                    </div>
                                                </div>
                                                
                                                <div class="invoice-title">
                                                    <input type="text" class="form-control" placeholder="Invoice Label" value="#{{ $order->tracking_no }}">
                                                </div>

                                            </div>

                                            <div class="invoice-detail-header">

                                                <div class="row justify-content-between">
                                                    <div class="col-xl-5 invoice-address-client">

                                                        <h4>Data Pembeli:</h4>

                                                        <div class="invoice-address-client-fields">

                                                            <div class="form-group row">
                                                                <label for="client-name" class="col-sm-3 col-form-label col-form-label-sm">Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-control-sm" value="{{ $order->name }}" placeholder="Client Name">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="client-email" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-control-sm" value="{{ $order->email }}" placeholder="name@company.com">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="client-phone" class="col-sm-3 col-form-label col-form-label-sm">Phone</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-control-sm" value="{{ $order->no_hp }}" placeholder="(123) 456 789">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                            </div>

                                            <div class="invoice-detail-terms">

                                                <div class="row justify-content-between">

                                                    <div class="col-md-3">

                                                        <div class="form-group mb-4">
                                                            <label for="number">Invoice Number</label>
                                                            <input type="text" class="form-control form-control-sm" value="#{{ $order->tracking_no }}" placeholder="#0001">
                                                        </div>

                                                    </div>

                                                    <div class="col-md-3">

                                                        <div class="form-group mb-4">
                                                            <label for="date">Invoice Date</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{ date('d F Y H:i:s', strtotime($order->created_at)) }}" placeholder="Add date picker">
                                                        </div>

                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group mb-4">
                                                            <label for="due">Due Date</label>
                                                            <input type="text" class="form-control form-control-sm" id="due" placeholder="None">
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                                
                                            </div>


                                            <div class="invoice-detail-items">

                                                <div class="table-responsive">
                                                    <table class="table item-table">
                                                        <thead>
                                                            <tr>
                                                                <th class="">No</th>
                                                                <th>Produk Name</th>
                                                                <th class="">Harga</th>
                                                            </tr>
                                                            <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($order->orderItem as $no => $item)                                                            
                                                            <tr>
                                                                <td class="delete-item-row">
                                                                    <ul class="table-controls">
                                                                        {{ $no + 1 }}
                                                                    </ul>
                                                                </td>
                                                                <td class="description">
                                                                    <input type="text" class="form-control form-control-sm" value="{{ $item->produks->name }}" placeholder="Item Description"> 
                                                                </td>
                                                                <td class="text-right amount"><span class="editable-amount"><span class="currency">Rp.</span> <span class="amount">{{ number_format($item->price) }}</span></span></td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                            <div class="invoice-detail-total">

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        
                                                        <div class="form-group row invoice-created-by">
                                                            <label for="payment-method-bank-name" class="col-sm-3 col-form-label col-form-label-sm">Metode Bayar:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control form-control-sm" value="{{ $order->metode }}" placeholder="Insert Bank Name">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="totals-row">
                                                            <div class="invoice-totals-row invoice-summary-subtotal">

                                                                <div class="invoice-summary-label">Subtotal</div>

                                                                <div class="invoice-summary-value">
                                                                    <div class="subtotal-amount">
                                                                        <span class="currency">Rp.</span><span class="amount">{{ number_format($order->total_price) }}</span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            

                                                            <div class="invoice-totals-row invoice-summary-total">

                                                                <div class="invoice-summary-label">Discount</div>

                                                                <div class="invoice-summary-value">
                                                                    <div class="total-amount">
                                                                        <span class="currency">Rp.</span><span>0.00</span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="invoice-totals-row invoice-summary-tax">

                                                                <div class="invoice-summary-label">Tax</div>

                                                                <div class="invoice-summary-value">
                                                                    <div class="tax-amount">
                                                                        <span>0%</span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="invoice-totals-row invoice-summary-balance-due">

                                                                <div class="invoice-summary-label">Total</div>

                                                                <div class="invoice-summary-value">
                                                                    <div class="balance-due-amount">
                                                                        <span class="currency">Rp.</span><span>{{ number_format($order->total_price) }}</span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <label for=""><i>Subtotal sudah termasuk + kode unik</i></label>
                                                
                                            </div>

                                            <div class="invoice-detail-note">

                                                <div class="row">
                                                
                                                    <div class="col-md-12 align-self-center">

                                                        <div class="form-group row invoice-note">
                                                            <label for="invoice-detail-notes" class="col-sm-12 col-form-label col-form-label-sm">Notes Client:</label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" id="invoice-detail-notes" placeholder='Notes - For example, "Thank you for doing business with us"' style="height: 88px;">{{ $order->message }}</textarea>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                </div>

                                            </div>


                                            
                                            <div class="invoice-detail-note">

                                                <div class="row">
                                                
                                                    <div class="col-md-12 align-self-center">

                                                        <div class="form-group row invoice-note">
                                                            <label for="invoice-detail-notes" class="col-sm-12 col-form-label col-form-label-sm">Notes Admin:</label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" name="message_admin" placeholder='Notes - For example, "Thank you for doing business with us"' style="height: 88px;">{{ $order->message_admin }}</textarea>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                </div>

                                            </div>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                                <div class="col-xl-3">
                                    
                                    <div class="invoice-actions">

                                        <div class="invoice-action-currency">
                                        
                                            <div class="form-group mb-0">
                                                <label>Action</label>
                                                <div class="row">
                                                <div>
                                                    <div class="dropdown selectable-dropdown invoice-tax-select">
                                                        <select class="form-select" name="status" id="status" required>
                                                            <option disabled selected>--pilih status--</option>
                                                            <option value="0" {{ $order->status == '0' ? 'selected' : '' }}>Unpaid</option>
                                                            <option value="1" {{ $order->status == '1' ? 'selected' : '' }}>Packing</option>
                                                            <option value="2" {{ $order->status == '2' ? 'selected' : '' }}>Kirim</option>
                                                            <option value="3" {{ $order->status == '3' ? 'selected' : '' }}>Selesai</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <div class="invoice-actions-btn">

                                        <div class="invoice-action-btn">

                                            <div class="row text-center">
                                                <div class="col-xl-12 col-md-4">
                                                    <button type="submit" class="btn btn-success btn-xl">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
                            
                        </div>

                    </div>
                </div>

            </div>
        </form>

    </div>

    @include('backend.layouts.footer')

</div>
<!--  END CONTENT AREA  -->

@endsection
