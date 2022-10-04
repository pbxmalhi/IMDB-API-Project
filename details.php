<!-- <pre> -->
<?php

if (isset($_REQUEST['titleid'])) {
    $ttid = $_REQUEST['titleid'];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://imdb8.p.rapidapi.com/title/get-overview-details?tconst=$ttid&currentCountry=US",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: imdb8.p.rapidapi.com",
            "X-RapidAPI-Key: c66530c790msh1ae06ae0d1454fep17321ejsnc8051f2d6e38"
        ],
    ]);
}


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $arr1 = json_decode($response, true);
    // print_r($arr1);
    $allData = array();
    $allData['image'] = (!empty($arr1['title']['image']['url'])) ? ($arr1['title']['image']['url']) : ("No Data Found");
    $allData['title'] = (!empty($title = $arr1['title']['title'])) ? ($title = $arr1['title']['title']) : ("No Data Found");
    $allData['episodes'] = (!empty($arr1['title']['numberOfEpisodes'])) ? ($arr1['title']['numberOfEpisodes']) : ("No Data Found");
    $allData['runtime'] = (!empty($arr1['title']['runningTimeInMinutes'])) ? ($arr1['title']['runningTimeInMinutes']) : ("No Data Found");
    $allData['seriesStartYear'] = (!empty($arr1['title']['seriesStartYear'])) ? ($arr1['title']['seriesStartYear']) : ("No Data Found");
    $allData['titleType'] = (!empty($arr1['title']['titleType'])) ? ($arr1['title']['titleType']) : ("No Data Found");
    $allData['year'] = (!empty($arr1['title']['year'])) ? ($arr1['title']['year']) : ("No Data Found");
    $allData['releaseDate'] = (!empty($arr1['releaseDate'])) ? ($arr1['releaseDate']) : ("No Data Found");
    $allData['plotSummary'] = (!empty($arr1['plotSummary']['text'])) ? ($arr1['plotSummary']['text']) : ("No Data Found");
    // print_r($allData);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <script>
        function goBack() {
            window.history.go(-1)
        }
    </script>
    <title>IMDB Project</title>
</head>

<body>
    <nav class="relative w-full flex flex-wrap items-center justify-between py-3 bg-gray-900 text-gray-200 shadow-lg navbar navbar-expand-lg navbar-light">
        <?php
        include("./commons/navbar.php");
        ?>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="flex items-center relative">
            <div class="flex justify-center">
                <div class="input-group relative flex flex-wrap items-stretch w-full rounded">
                    <div class="flex space-x-2">
                        <button onclick="goBack()" class="inline-block px-6 py-2.5 bg-amber-400 text-black font-medium text-xs leading-tight uppercase rounded shadow-md">Back</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right elements -->
        </div>
    </nav>


    <section class="overflow-hidden text-gray-700 ">
        <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-14">
            <div class="flex flex-wrap -m-1 md:-m-2">
                <div class="flex flex-wrap w-full">
                    <div class="w-full flex p-1 md:p-2 mx-5 my-5">
                        <img alt="gallery" class="block object-cover object-center w-1/2 h-[550px] rounded-lg" src="<?php echo $allData['image'] ?>">
                        <table class="w-full p-1 md:p-2 mx-5 my-5">
                            <tr>
                                <th colspan="2" class="font-semibold text-3xl leading-10"><?php echo ((isset($allData['title']))) ?  ($allData['title']) : ("No Data found") ?></th>
                            </tr>
                            <tr>
                                <td>Episodes : </td>
                                <td><?php echo ((isset($allData['episodes']))) ?  ($allData['episodes']) : ("No Data found") ?></td>
                            </tr>
                            <tr>
                                <td>Runtime : </td>
                                <td><?php echo ((isset($allData['runtime']))) ?  ($allData['runtime']) : ("No Data found") ?></td>
                            </tr>
                            <tr>
                                <td>Start Year : </td>
                                <td><?php echo ((isset($allData['seriesStartYear']))) ?  ($allData['seriesStartYear']) : ("No Data found") ?></td>
                            </tr>
                            <tr>
                                <td>Genre Type : </td>
                                <td><?php echo ((isset($allData['titleType']))) ?  ($allData['titleType']) : ("No Data found") ?></td>
                            </tr>
                            <tr>
                                <td>Year : </td>
                                <td><?php echo ((isset($allData['year']))) ?  ($allData['year']) : ("No Data found") ?></td>
                            </tr>
                            <tr>
                                <td>Release Date : </td>
                                <td><?php echo ((isset($allData['releaseDate']))) ?  ($allData['releaseDate']) : ("No Data found") ?></td>
                            </tr>
                            <tr>
                                <td width="20%">Plot Summary : </td>
                                <td><?php echo ((isset($allData['plotSummary']))) ?  ($allData['plotSummary']) : ("No Data found") ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>

</html>