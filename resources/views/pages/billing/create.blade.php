<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <style type="text/css">
        @page {
            margin: 0px;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: medium;
            border: 4px;
        }
        .body table tr td{
          border-collapse: collapse;

        }
        .tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }


        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>
</head>

<body>
  <div class="information">
      <table width="100%">
          <tr>
              <td align="center">
                  <img src="immowebicon.png" alt="Logo" width="240" class="logo"/>
              </td>
              <td align="right" style="width: 40%;">

                  <h3>ImmoWeb AG</h3>
                  <pre>
                      http://fhimmoweb.herokuapp.com/
                      Hauptstrasse 12
                      4000 Basel
                      Schweiz CH
                  </pre>
              </td>
          </tr>

      </table>
  </div>

  <div class="container box">
    <br>
    <br>
    <h2 align="center">Abrechnungsübersicht</h2></br>
    <br>
    <br>
    <table align="center" class="abrechnung" >
      <thead>
      <tr>
          <th scope="col">RG-Nr.</th>
          <th scope="col">RG-Typ</th>
          <th scope="col">Vertrags-Nr.</th>
          <th scope="col">Rechnungsdatum</th>
          <th scope="col">Fälligkeitsdatum</th>
          <th scope="col">Betrag</th>
          <th scope="col">Status</th>
      </tr>
      </thead>

      <tbody>
       @foreach($yearlyInvoices as $yearlyInvoice)

       @if(($date = new DateTime($yearlyInvoice->created_at)) < new DateTime('2019-12-31'))
       @if(($date = new DateTime($yearlyInvoice->created_at)) > new DateTime('2019-01-01'))
         <tr>
             <td scope="col">{{$yearlyInvoice->id}}</td>
             <td scope="col">{{$yearlyInvoice->type}}</td>
             <td scope="col">{{$yearlyInvoice->contractFk}}</td>
             <td scope="col">{{$yearlyInvoice->created_at}}</td>
             <td scope="col">{{$yearlyInvoice->dueDate}}</td>
             <td scope="col">{{$yearlyInvoice->amount}}</td>
             <td scope="col">{{$yearlyInvoice->isPayed}}</td>
         </tr>
         @endif
         @endif
         @endforeach
     </tbody>
  </table>
  </div>

  <div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} ImmoWeb AG - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                <i>"Ihr Wohlbefinden ist unser Anliegen!"</i>
            </td>
        </tr>

    </table>
</div>
</body>
</html>
