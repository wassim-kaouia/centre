<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture</title>
    <link href="http://centre.projects/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-end font-size-16">Facture # 12345</h4>
                        <div class="mb-4">
                            <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" height="20"/>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <address>
                                <strong>Facturé à:</strong><br>
                                {{ $payment->student->user->full_name }}<br>
                                {{ $payment->student->address }}
                            </address>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <address class="mt-2 mt-sm-0">
                                <strong>Edité par:</strong><br>
                                {{ Auth::user()->full_name }}<br>
                                Benguerire lotissement 4<br>
                                appt 12, 4332-12<br>
                                0666 55 33 23
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mt-3">
                            <address>
                                <strong>Methode de paiement:</strong><br>
                                Espèces<br>
                                {{ $payment->student->user->email }}
                            </address>
                        </div>
                        <div class="col-sm-6 mt-3 text-sm-end">
                            <address>
                                <strong>Date de Facturation:</strong><br>
                                {{ \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y') }}<br><br>
                            </address>
                        </div>
                    </div>
                    <div class="py-2 mt-3">
                        <h3 class="font-size-15 font-weight-bold">Debours</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 70px;">No.</th>
                                    <th>Item</th>
                                    <th class="text-end">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Skote - Admin Dashboard Template</td>
                                    <td class="text-end">$499.00</td>
                                </tr>
                                
                                <tr>
                                    <td>02</td>
                                    <td>Skote - Landing Template</td>
                                    <td class="text-end">$399.00</td>
                                </tr>
    
                                <tr>
                                    <td>03</td>
                                    <td>Veltrix - Admin Dashboard Template</td>
                                    <td class="text-end">$499.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-end">Sub Total</td>
                                    <td class="text-end">$1397.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-0 text-end">
                                        <strong>Shipping</strong></td>
                                    <td class="border-0 text-end">$13.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-0 text-end">
                                        <strong>Total</strong></td>
                                    <td class="border-0 text-end"><h4 class="m-0">$1410.00</h4></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <script src="http://centre.projects/assets/libs/bootstrap/bootstrap.min.js"></script>
</body>
</html>