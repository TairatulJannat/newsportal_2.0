
               
 <h1 class="page-title mb-4">Country: <span style ='color:red'>{{$data['country']}}</span></h1>
 <div class="row">
    <div id="no-more-tables" class="table-1">
        <table class="col-md-12 table-bordered table-striped table-condensed cf mb-4 p-0">
            <thead class="cf">
                <tr>
                    
                    <th class="numeric">Today Cases</th>
                    <th class="numeric">Total Cases</th>
                    <th class="numeric">Total Recovered</th>
                    <th class="numeric">Today Deaths </th>
                    <th class="numeric">Total Deaths</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                    <td data-title="">{{$data['todayCases']}}</td>
                    <td data-title="">{{$data['cases']}}</td>
                    <td data-title="" class="numeric">{{$data['recovered']}}</td>
                    <td data-title="" class="numeric">{{$data['todayDeaths']}}</td>
                    <td data-title="" class="numeric">{{$data['deaths']}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div id="no-more-tables" class="table-2">
        <table class="col-md-12 table-bordered table-striped table-condensed cf p-0">
            <thead class="cf">
                <tr>
                    <th class="numeric">Active Cases</th>
                    <th class="numeric">Critical Cases</th>
                    <th class="numeric">Cases Per One Million</th>
                    <th class="numeric">Deaths Per One Million</th>
                    <th class="numeric">Total Tests</th>
                    <th class="numeric">Tests Per One Million</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-title="" class="numeric">{{$data['active']}}</td>
                    <td data-title="" class="numeric">{{$data['critical']}}</td>
                    <td data-title="" class="numeric">{{$data['casesPerOneMillion']}}</td>
                    <td data-title="" class="numeric">{{$data['deathsPerOneMillion']}}</td>
                    <td data-title="" class="numeric">{{$data['totalTests']}}</td>
                    <td data-title="" class="numeric">{{$data['testsPerOneMillion']}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>      
                
   