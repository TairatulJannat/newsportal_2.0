@php
$globalRank = '';
$countryRank = '';
function alexaRank($url) 
{
    // $url = "https://aleshamart.com/";
    // $alexa = alexaRank($url);
    
    $alexaData = simplexml_load_file("http://data.alexa.com/data?cli=10&url=".$url);
    $alexa['globalRank'] =  isset($alexaData->SD->POPULARITY) ? $alexaData->SD->POPULARITY->attributes()->TEXT : 0 ;
    $alexa['CountryRank'] =  isset($alexaData->SD->COUNTRY) ? $alexaData->SD->COUNTRY->attributes()->RANK: 0 ;
    // $alexa['Country'] =  isset($alexaData->SD->COUNTRY) ? $alexaData->SD->COUNTRY->attributes() : 0 ;
    // $globalRank ="Global Alexa Rank of https://thevoice24.com/ is : ".$alexa['globalRank'][0];
    // $countryRank ="Alexa Rank In ".$alexa['CountryRank']['@attributes']['NAME']." is : ".$alexa['CountryRank']['@attributes']['RANK'];
    // echo  isset($alexaData->SD->POPULARITY) ? $alexaData->SD->POPULARITY->attributes()->TEXT : 0 ;
    // echo  isset($alexaData->SD->COUNTRY) ? $alexaData->SD->COUNTRY->attributes() : 0 ;

    return json_decode(json_encode($alexa), TRUE);
}
@endphp