<div>
    <div class="row">
        <div class="col-xs-7">
            <h4>From:</h4>
            <strong>Triple E Catering Services</strong>
            <br> Poblacion, Clarin, Bohol
            <br> P: (038) 509-9063
            <br> E: jheyceq05@yahoo.com
            <br>

            <br>
        </div>

        <div class="col-xs-4">
            <h4><strong>Triple E Catering Services</strong></h4>
        </div>
    </div>

    <div style="margin-bottom: 0px">&nbsp;</div>

    <div class="row">
        <div class="col-xs-6">
            <h4>To:</h4>
            <address>
            <strong>{{ $reservation->name }}</strong><br>
            <strong>Venue:</strong><br>
            <span>{{ $reservation->venue }}</span> <br>
            <span>{{ $reservation->email }}</span><br>
            <span>{{ $reservation->contact }}</span>
        </address>
        </div>

        <div class="col-xs-5">
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <th>Total Pax:</th>
                        <td class="text-right">{{ $reservation->pax }}</td>
                    </tr>
                    <tr>
                        <th>Setting Price:</th>
                        <td class="text-right">{{ $reservation->setting->description }}</td>
                    </tr>
                    <tr>
                        <th> Transportation Fee:</th>
                        <td class="text-right">{{ $reservation->payment->transportation_charge }}</td>
                    </tr>
                    <tr>
                        <th> Total Payable:</th>
                        <td class="text-right">{{ $reservation->payment->payable }}</td>
                    </tr>
                    <tr>
                        <th> Payment/Down Payment:</th>
                        <td class="text-right">{{ $reservation->payment->payment }}</td>
                    </tr>
                    {{-- <tr>
                        <th> Date: </th>
                        <td class="text-right">{{ $date }}</td>
                    </tr> --}}
                </tbody>
            </table>

            <div style="margin-bottom: 0px">&nbsp;</div>

            <table style="width: 100%; margin-bottom: 20px">
                <tbody>
                    <tr class="well" style="padding: 5px">
                        <th style="padding: 5px">
                            <div>Balance: </div>
                        </th>
                        <td style="padding: 5px" class="text-right"><strong> P{{ $reservation->payment->balance }} </strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <table class="table">
        <thead style="background: #F5F5F5;">
            <tr>
                <th>Item List</th>
                <th></th>
                <th class="text-right">Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div><strong>Service</strong></div>
                    <p>{{ $reservation->service->name }}</p><br>
                    <p>{{ $reservation->service->description }}</p>
                </td>
                <td></td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td>
                    <div><strong>Setting</strong></div>
                    <p>{{ $reservation->setting->name }}</p>
                    <p>{{ $reservation->setting->description }}</p>
                </td>
                <td></td>
                <td class="text-right"> P{{ $reservation->setting->price }}</td>
            </tr>
            <tr>
                <td>
                    <div><strong>Inclusion</strong></div>
                    @foreach($inclusion->features as $feature)
                        {{ $loop->first ? '' : ',' }}
                        {{ $feature->name }}
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-5">
            <table style="width: 100%">
                <tbody>
                    <tr class="well" style="padding: 5px">
                        <th style="padding: 5px">
                            <div> Balance: </div>
                        </th>
                        <td style="padding: 5px" class="text-right"><strong> P{{ $reservation->payment->balance }} </strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-bottom: 0px">&nbsp;</div>

    <div class="row">
        <div class="col-xs-6 invbody-terms">
            Thank you for your business.
            <br>
            <br>
            <br>
            <br>
            <h4>{{ $reservation->name }}</h4>
            <small>Signature over printed name</small>
        </div>
        <div class="col-xs-6 invbody-terms">
            <br>
            <br>
            <br>
            <br>
            <h4>Management</h4>
            <small>Signature over printed name</small>
        </div>
    </div>
</div>










{{-- <!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">

<title>Invoice</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
.text-right {
    text-align: right;
}
</style>

</head>
<body class="login-page" style="background: white">

<div>
<div class="row">
    <div class="col-xs-7">
        <h4>From:</h4>
        <strong>Company Inc.</strong><br>
        123 Company Ave. <br>
        Toronto, Ontario - L2R 5A4<br>
        P: (416) 123-4567 <br>
        E: copmany@company.com <br>

        <br>
    </div>

    <div class="col-xs-4">
        <img src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1537151698/website/logo.png" alt="logo">
    </div>
</div>

<div style="margin-bottom: 0px">&nbsp;</div>

<div class="row">
    <div class="col-xs-6">
        <h4>To:</h4>
        <address>
            <strong>Andre Madarang</strong><br>
            <span>andre@andre.com</span> <br>
            <span>123 Address St.</span>
        </address>
    </div>

    <div class="col-xs-5">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <th>Invoice Num:</th>
                    <td class="text-right">56</td>
                </tr>
                <tr>
                    <th> Invoice Date: </th>
                    <td class="text-right">Oct 1, 2018</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <table style="width: 100%; margin-bottom: 20px">
            <tbody>
                <tr class="well" style="padding: 5px">
                    <th style="padding: 5px"><div> Balance Due (CAD) </div></th>
                    <td style="padding: 5px" class="text-right"><strong> $600 </strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<table class="table">
    <thead style="background: #F5F5F5;">
        <tr>
            <th>Item List</th>
            <th></th>
            <th class="text-right">Price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><div><strong>Service</strong></div>
                <p>Description here. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt maiores placeat similique nisi. Nisi ratione, molestias exercitationem illo reiciendis cumque?</p></td>
                <td></td>
                <td class="text-right">$600</td>
        </tr>
        <tr>
            <td><div><strong>Service</strong></div>
                <p>Description here. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt maiores placeat similique nisi. Nisi ratione, molestias exercitationem illo reiciendis cumque?</p></td>
                <td></td>
                <td class="text-right">$600</td>
        </tr>
    </tbody>
</table>

    <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-5">
            <table style="width: 100%">
                <tbody>
                    <tr class="well" style="padding: 5px">
                        <th style="padding: 5px"><div> Balance Due (CAD) </div></th>
                        <td style="padding: 5px" class="text-right"><strong> $600 </strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-bottom: 0px">&nbsp;</div>

    <div class="row">
        <div class="col-xs-8 invbody-terms">
            Thank you for your business. <br>
            <br>
            <h4>Payment Terms</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eius quia, aut doloremque, voluptatibus quam ipsa sit sed enim nam dicta. Soluta eaque rem necessitatibus commodi, autem facilis iusto impedit!</p>
        </div>
    </div>
</div>

</body>
</html> --}}