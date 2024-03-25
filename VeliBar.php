#!/opt/homebrew/bin/php
<?php
# <xbar.title>VeliBar</xbar.title>
# <xbar.version>v1.0</xbar.version>
# <xbar.author>Martin Le Hénand</xbar.author>
# <xbar.author.github>lehenandmartin</xbar.author.github>
# <xbar.desc>SwiftBar plugin to display the number of available bikes and docks at your chosen Vélib stations</xbar.desc>
# <xbar.image>https://raw.githubusercontent.com/lehenandmartin/velibar/main/screenshot.jpg</xbar.image>
# <xbar.dependencies>php</xbar.dependencies>
# <xbar.abouturl>https://github.com/lehenandmartin/velibar/</xbar.abouturl>

# <swiftbar.hideAbout>true</swiftbar.hideAbout>
# <swiftbar.hideRunInTerminal>true</swiftbar.hideRunInTerminal>
# <swiftbar.hideLastUpdated>true</swiftbar.hideLastUpdated>
# <swiftbar.hideDisablePlugin>true</swiftbar.hideDisablePlugin>
# <swiftbar.hideSwiftBar>true</swiftbar.hideSwiftBar>
# <swiftbar.refreshOnOpen>true</swiftbar.refreshOnOpen>

$stationsCode = ['13053', '13052', '13054', '16115', '16116'];

function fetchData($url) {
    return json_decode(file_get_contents($url));
}

function findStationData($stationCode, $stationsData) {
    foreach ($stationsData as $station) {
        if ($station->stationCode == $stationCode) {
            return $station;
        }
    }
    return null;
}

echo ":bicycle:\n";
echo "---\n";

$apiInformationUrl = "https://velib-metropole-opendata.smovengo.cloud/opendata/Velib_Metropole/station_information.json";
$apiStatusUrl = "https://velib-metropole-opendata.smovengo.cloud/opendata/Velib_Metropole/station_status.json";

$apiInformation = fetchData($apiInformationUrl)->data->stations;
$apiStatus = fetchData($apiStatusUrl)->data->stations;

foreach ($stationsCode as $stationCode) {
    $stationInfo = findStationData($stationCode, $apiInformation);
    $stationStatus = findStationData($stationCode, $apiStatus);

    if ($stationInfo && $stationStatus) {
        echo "**" . $stationInfo->name . "** | md=true\n";
        echo ":bicycle.circle.fill: " . $stationStatus->num_bikes_available_types[0]->mechanical;
        echo " :bicycle.circle.fill: " . $stationStatus->num_bikes_available_types[1]->ebike;
        echo " :parkingsign.circle.fill: " . $stationStatus->numDocksAvailable . " | sfsize=20 sfcolor=#78B648 sfcolor2=#61C3DC sfcolor3=#0169A4\n";
        echo "---\n";
    }
}